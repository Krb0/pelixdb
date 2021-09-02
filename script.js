// Insert your API Key
const API_KEY = "";
const API_URL = `https://api.themoviedb.org/3/discover/movie?api_key=${API_KEY}&language=es-ES`;
const IMG_PRFX_PATH = "https://image.tmdb.org/t/p/w500";
const SEARCH_API = `https://api.themoviedb.org/3/search/movie?api_key=${API_KEY}&language=es-ES&query=`;

const main = document.querySelector("#main");
const form = document.querySelector("#searchForm");
const search = document.querySelector(".search");
const loginWindow = document.querySelector(".login-window");

getMovies(API_URL);
async function getMovies(url, isSearch = false) {
  if (!isSearch) {
    const pageFirst = url + RndPAGE();
    const pageSecond = url + RndPAGE();
    const pageThird = url + RndPAGE();

    Promise.all([fetch(pageFirst), fetch(pageSecond), fetch(pageThird)]).then(
      async (data) => {
        Promise.all([data[0].json(), data[1].json(), data[2].json()]).then(
          (res) => {
            showMovies(res);
            saveListener();
          }
        );
      }
    );
  } else {
    data = await (await fetch(url)).json();
    await showSearch(data);
    saveListener();
  }
}
async function showMovies(res) {
  main.innerHTML = "";
  res.forEach((resItem) => {
    resItem.results.forEach((movieFound) => {
      const { title, poster_path, vote_average, release_date } = movieFound;
      let { overview } = movieFound;
      overview = !overview
        ? "No se ha podido encontrar una sinopsis para este título"
        : overview;
      const movieEl = document.createElement("div");
      movieEl.classList.add("movie");
      movieEl.innerHTML = `
            <div class="movie-save">
                <input class="input-movie-save" type="image" src="assets/empty-heart.svg"/>
            </div>
            <div class="movie-date-container"><span>${release_date.substring(
              0,
              4
            )}</span></div>
            <img src="${IMG_PRFX_PATH + poster_path}" alt="Poster pelicula">
            <div class="movie-info">
                <h3>${title}</h3>
                <span class="${getClassByRate(
                  vote_average
                )}">${vote_average}</span>
            </div>
            <div class="sinopsis">
                <h3>Sinopsis</h3>${overview}.
            </div>
            `;
      main.appendChild(movieEl);
    });
  });
}
async function showSearch(res) {
  main.innerHTML = " ";
  try {
    res.results.forEach((movieFound) => {
      const { title, poster_path, vote_average, overview, release_date } =
        movieFound;
      const movieEl = document.createElement("div");
      movieEl.classList.add("movie");
      movieEl.innerHTML = `
            <div class="movie-save">
                <input class="input-movie-save" type="image" src="assets/empty-heart.svg"/>
            </div>            
            <div class="movie-date-container"><span>${release_date.substring(
              0,
              4
            )}</span></div>
            <img src="${IMG_PRFX_PATH + poster_path}" alt="Poster pelicula">
            <div class="movie-info">
                <h3>${title}</h3>
                <span class="${getClassByRate(
                  vote_average
                )}">${vote_average}</span>
            </div>
            <div class="sinopsis">
                <h3>Sinopsis</h3>${overview}.
            </div>
            `;
      main.appendChild(movieEl);
    });
  } catch {
    main.innerHTML = `<h2 class="search-error">¡Hubo un error en la búsqueda, Intente de nuevo!</h2>`;
  }
}
function getClassByRate(vote) {
  if (vote >= 7.5) {
    return "rating-top";
  } else if (vote >= 5) {
    return "rating-mid";
  } else {
    return "rating-bot";
  }
}
document.querySelectorAll(".login-check").forEach((elem) => {
  elem.addEventListener("click", (e) => {
    loginMenu(e.target);
  });
});
function registerWindow() {
  loginWindow.innerHTML = `
        <div class="close-window login-check"></div>
        <h2>Registro</h2>
        <form method="POST" id="loginForm" action="register.php">
            <label for="user_email">Correo Electrónico</label><input name="user_email" type="email" id="user_email" required>
            <label for="user_name">Usuario</label><input name="user_name" type="name" id="user_name" required>
            <label for="user_pass">Contraseña</label><input name="user_pass" type="password" id="user_pass" required>
            <button class="form-btn" name="register" type="submit" id="submit">Registrarse</button>
            <hr>
            <div class="login-extra">
                <a href="#" class="forgot-pass" id="loginBtn" onclick="loginReset()">¿Ya tienes cuenta?</a><a href="#" class="forgot-pass"> ¿Olvidaste tu contraseña?</a>
            </div>
        </form>`;
}

function loginReset() {
  loginWindow.innerHTML = `
        <div class="close-window login-check"></div>
        <h2>Ingresar</h2>
        <form method="POST" id="loginForm" action="login.php">
            <label for="user_name">Correo o Usuario</label><input name="user_name" type="name" id="user_name" required>
            <label for="user_pass">Contraseña</label><input name="user_pass" type="password" id="user_pass" required>
            <div class="check-container">
                <input type="checkbox" id="remember"><label for="remember" id="remember-pass">Recordar Contraseña</label>
            </div>
            <button class="form-btn" type="submit" id="submit">Entrar</button>
            <hr>
            <div class="login-extra">
                <a href="#" class="forgot-pass" name="login" onclick="registerWindow()">¿Aún no tienes cuenta?</a><a href="#" class="forgot-pass"> ¿Olvidaste tu contraseña?</a>
            </div>
        </form>`;
}

function loginMenu(element) {
  if (element == document.querySelector(".login-logo")) {
    document.querySelector(".login-parent").style.display = "block";
    document.querySelector(".overlay").style.display = "block";
    document.body.style.overflow = "hidden";
    document.querySelector(".login-logo").style.color = "white";
    if (window.innerWidth > 550) {
      document.querySelector(".login-window").style.animation =
        "expandMenu 1s 0s";
    }
  } else {
    document.querySelector(".login-parent").style.display = "none";
    document.querySelector(".overlay").style.display = "none";
    document.body.style.overflow = "auto";
    document.querySelector(".login-logo").style.color = "black";
  }
}

form.addEventListener("submit", (r) => {
  r.preventDefault();
  const searchTerm = search.value;

  if (searchTerm && searchTerm !== "") {
    getMovies(SEARCH_API + searchTerm, true);
    search.value = "";
  } else {
    window.location.reload();
  }
});

function RndPAGE() {
  return `&page=${Math.floor(Math.random() * (500 - 1) + 1)}`;
}

function saveListener() {
  document.querySelectorAll(".input-movie-save").forEach((element) => {
    element.addEventListener("click", (e) => {
      const fullHeartPath = `assets/full-heart.svg`;
      const emptyHeart = `assets/empty-heart.svg`;

      if (e.target.getAttribute("src") == fullHeartPath) {
        e.target.setAttribute("src", emptyHeart);
      } else if (e.target.getAttribute("src") == emptyHeart) {
        e.target.setAttribute("src", fullHeartPath);
      }
    });
  });
}

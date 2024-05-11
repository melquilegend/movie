const arrows = document.querySelectorAll(".arrow");
const movieLists = document.querySelectorAll(".movie-list");

arrows.forEach((arrow, i) => {
  const itemNumber = movieLists[i].querySelectorAll("img").length;
  let clickCounter = 0;
  arrow.addEventListener("click", () => {
    const ratio = Math.floor(window.innerWidth / 270);
    clickCounter++;
    if (itemNumber - (4 + clickCounter) + (4 - ratio) >= 0) {
      movieLists[i].style.transform = `translateX(${
        movieLists[i].computedStyleMap().get("transform")[0].x.value - 300
      }px)`;
    } else {
      movieLists[i].style.transform = "translateX(0)";
      clickCounter = 0;
    }
  });

  console.log(Math.floor(window.innerWidth / 270));
});

// Toggle Ball
const ball = document.querySelector(".toggle-ball");

// Select items to toggle 'active' class including the menu list
const items = document.querySelectorAll(
  ".container, .movie-list-title, .navbar-container, .sidebar, .left-menu-icon, .toggle, .menu-list"
);

// Event listener for the toggle ball
ball.addEventListener("click", () => {
  items.forEach((item) => {
    item.classList.toggle("active");
  });
  ball.classList.toggle("active");
});



function applyFilters() {
  const name = document.getElementById('filterName').value;
  const year = document.getElementById('filterYear').value;
  const genre = document.getElementById('filterGenre').value;

  const queryParams = new URLSearchParams({
      name: name,
      year: year,
      genre: genre
  }).toString();

  window.location.href = `movie-list/?${queryParams}`; // Make sure the path here is correct
}


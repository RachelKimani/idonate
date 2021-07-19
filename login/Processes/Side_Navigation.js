const selectElement = (s) => document.querySelector(s);

//to open
selectElement('.open').addEventListener('click', () => {
   selectElement('.nav-list').classList.add('active');
   document.getElementById("form").style.visibility = "hidden";
});

//to close
selectElement('.close').addEventListener('click', () => {
   selectElement('.nav-list').classList.remove('active');
   document.getElementById("form").style.visibility = "visible";
});


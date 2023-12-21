<style>
  /* Style de base pour la barre de navigation */
/* Style de base pour la barre de navigation */
.navbar {
    background-color: #3498db; /* Bleu attirant */
    border-bottom: 2px solid #2980b9; /* Bordure légèrement plus foncée */
    padding: 15px 0; /* Ajustement de la marge interne */
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
}

/* Style pour le texte de la marque et les liens de navigation */
.navbar-brand,
.navbar-nav .nav-link {
    color: #fff; /* Texte en blanc */
    font-weight: bold;
    transition: color 0.3s ease-in-out;
    font-size: 18px; /* Taille de la police ajustée */
}

/* Style pour l'icône du bouton hamburger */
.navbar-toggler-icon {
    background-color: #fff; /* Icône en blanc */
}

/* Style pour la liste des liens, affichée horizontalement */
.navbar-nav {
    display: flex;
    align-items: center;
}

/* Style pour chaque élément de la liste de liens */
.navbar-nav .nav-item {
    margin-right: 20px; /* Marge entre les liens ajustée */
}

/* Style pour le lien actif */
.navbar-nav .nav-item.active .nav-link {
    background-color: #2980b9; /* Couleur de fond pour l'élément actif */
}

/* Style au survol des liens */
.navbar-nav .nav-item .nav-link:hover {
    color: #2980b9; /* Changement de couleur au survol */
}

/* Style pour la barre de navigation déroulante */
.navbar-collapse {
    background-color: #fff; /* Fond de la barre de navigation déroulante en blanc */
    border-top: 1px solid #b0e0e6; /* Bordure légère en haut */
}

/* Style pour le bouton hamburger */
.navbar-toggler {
    border: none;
}

/* Style au survol du bouton hamburger */
.navbar-toggler:hover {
    color: #2980b9; /* Changement de couleur au survol */
}



  </style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>

  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">index <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signup.php">signup</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="panier.php">panier</a>
      </li>
    </ul>
  </div>
</nav>
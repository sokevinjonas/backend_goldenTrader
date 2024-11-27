<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <!-- Dashboard -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Utilisateurs -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>Utilisateurs</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="user-nav" class="nav-content collapse">
          <li>
            <a href="{{route('listes_utilisateurs')}}">
              <i class="bi bi-circle"></i><span>Liste des utilisateurs</span>
            </a>
          </li>
          <li>
            <a href="./users-analysts.html">
              <i class="bi bi-circle"></i><span>Analysts</span>
            </a>
          </li>
          <li>
            <a href="./users-investors.html">
              <i class="bi bi-circle"></i><span>Investors</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Publications -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#publications-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Publications</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="publications-nav" class="nav-content collapse">
          <li>
            <a href="{{route('listes_publications')}}">
              <i class="bi bi-circle"></i><span>Liste</span>
            </a>
          </li>
          <li>
            <a href="./publications-reported.html">
              <i class="bi bi-circle"></i><span>Signalées</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Abonnements -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#subscriptions-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-currency-exchange"></i><span>Abonnements</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="subscriptions-nav" class="nav-content collapse">
          <li>
            <a href="./subscriptions-plans.html">
              <i class="bi bi-circle"></i><span>Plans d'abonnement</span>
            </a>
          </li>
          <li>
            <a href="./subscriptions-list.html">
              <i class="bi bi-circle"></i><span>Abonnements actifs</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Parrainages -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#referral-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-share"></i><span>Parrainage</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="referral-nav" class="nav-content collapse">
          <li>
            <a href="./referral-settings.html">
              <i class="bi bi-circle"></i><span>Paramètres</span>
            </a>
          </li>
          <li>
            <a href="./referral-list.html">
              <i class="bi bi-circle"></i><span>Liste des parrains</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Modération -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#moderation-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-shield-check"></i><span>Modération</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="moderation-nav" class="nav-content collapse">
          <li>
            <a href="./moderation-reports.html">
              <i class="bi bi-circle"></i><span>Signalements</span>
            </a>
          </li>
          <li>
            <a href="./moderation-tickets.html">
              <i class="bi bi-circle"></i><span>Tickets support</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- Paramètres -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="./settings.html">
          <i class="bi bi-gear"></i>
          <span>Paramètres</span>
        </a>
      </li>

      <!-- Déconnexion -->
      <li class="nav-heading">
        <hr>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" onclick="return confirm('Êtes-vous sûr ?')">
          <i class="bi bi-box-arrow-right"></i>
          <span>Déconnexion</span>
        </a>
      </li>
    </ul>
  </aside>

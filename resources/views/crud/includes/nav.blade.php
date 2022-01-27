@include('admin.includes.header')

<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light justify-content-between">
  <a class="navbar-brand" href=""><img  width="50px" height="50px" src="https://image.similarpng.com/very-thumbnail/2020/05/Pizza-logo-design-template-Vector-PNG.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      
      

      <li class="nav-item">
        <a class="nav-link" href="/adminpanel/login">Login </a>
      </li> <li class="nav-item">
        <a class="nav-link" href="/adminpanel/register">Rgister</a>
      </li>
      
    </ul>
  </div>
</nav>

@include('admin.includes.footer')
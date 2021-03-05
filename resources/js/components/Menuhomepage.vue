<template>
<div>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="/">Teluk Coding</a>
        <div id="close-sidebar">
          <i class="fas fa-arrow-left"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic"> 
          <img :src="'/images/myprofile/profile.jpg'" class="img-responsive img-rounded" alt="my profile">
        </div>
        <div class="user-info">
          <span class="user-name">Welcome to my blog. 
          </span>
          <span class="user-role">@telukcoding</span>
        </div>
      </div>

      <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>Menu</span>
          </li>
          <li>
           <router-link :to="{ name: 'homepageposts' }">
                 <i class="fa fa-book " aria-hidden="true"></i>
                  <span>Blog</span> 
            </router-link> 
          </li>
          <li> 
            <router-link :to="{ name: 'about' }">
              <i class="fa fa-book " aria-hidden="true"></i>
                <span>About</span>
            </router-link>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Other</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Link</a>
                </li>
                <li>
                  <a href="#">Link</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div> 
    </div> 
  </nav>
</div>
</template>
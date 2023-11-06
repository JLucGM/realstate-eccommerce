   <div class="nav-content d-flex">
       <!-- Logo Start -->
       <div class="logo position-relative">
           <a href="/">
               <!-- Logo can be added directly -->
               {{--<img src="../image/{{ $setting->logo_empresa }}" alt="logo" />--}}
               <!-- Or added via css to provide different ones for different color themes -->
               <div class=""></div>
           </a>
       </div>
       <!-- Logo End -->

       <!-- User Menu Start -->
       <div class="user-container d-flex">
           <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

               @if (auth()->check())
               <img class="profile" alt="profile" src="{{asset('img/profile/'.auth()->user()->avatar)}}" />
               <div class="name">{{auth()->user()->name.' '.auth()->user()->last_name}}</div>
               @else
               <div class="name">No deberias estar aqui</div>
               @endif
           </a>



           @if (auth()->check())

           <div class="dropdown-menu dropdown-menu-end user-menu wide">
               <div class="row mb-1 ms-0 me-0">
                   <div class="col-6 ps-1 pe-1">
                       <ul class="list-unstyled">
                           <li>
                               <a href="/">
                                   <i data-acorn-icon="gear" class="me-2" data-acorn-size="17"></i>
                                   <span class="align-middle">Inicio</span>
                               </a>
                           </li>
                           <li>
                               <a href="{{route('profile')}}">
                                   <i data-acorn-icon="gear" class="me-2" data-acorn-size="17"></i>
                                   <span class="align-middle">Perfil</span>
                               </a>
                           </li>
                       </ul>
                   </div>
                   <div class="col-6 pe-1 ps-1">
                       <ul class="list-unstyled">
                           <li>
                               <a href="{{route('login.destroy')}}">
                                   <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                                   <span class="align-middle">Salir</span>
                               </a>
                           </li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
       <!-- User Menu End -->

       <!-- Icons Menu Start -->
       <ul class="list-unstyled list-inline text-center menu-icons">
           <li class="list-inline-item">
               <a href="#" data-bs-toggle="modal" data-bs-target="#searchPagesModal">
                   <i data-acorn-icon="search" data-acorn-size="18"></i>
               </a>
           </li>
           <li class="list-inline-item">
               <a href="#" id="pinButton" class="pin-button">
                   <i data-acorn-icon="lock-on" class="unpin" data-acorn-size="18"></i>
                   <i data-acorn-icon="lock-off" class="pin" data-acorn-size="18"></i>
               </a>
           </li>
           <li class="list-inline-item">
               <a href="#" id="colorButton">
                   <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                   <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
               </a>
           </li>
           <li class="list-inline-item">
               <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true" aria-expanded="false" class="notification-button">
                   <div class="position-relative d-inline-flex">
                       <i data-acorn-icon="bell" data-acorn-size="18"></i>
                       <span class="mx-2 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info"> {{ count(auth()->user()->unreadNotifications) }}</span>
                   </div>
               </a>
               <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications">

                   <a href="{{ route('markAsRead') }}" class="float-right btn btn-link text-sm ">Marcar como leidas</a>

                   <div class="scroll">
                       <ul class="list-unstyled border-last-none">

                           @forelse(auth()->user()->unreadNotifications as $notification)

                           <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                               <img src="/img/profile/profile-1.webp" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                               <div class="align-self-center">
                                   {{ $notification->data['title']}}
                                   <div>

                                       {{ $notification->data['mensaje']}}.

                                       <span class="float-right text-muted text-sm"> {{ $notification->created_at->diffForHumans() }} </span>

                                   </div>

                               </div>
                           </li>
                           @empty
                           <li>
                               <div class="dropdown-item text-justify">
                                   <p class="m- text-justify">
                                       No hay notificaciones nuevas
                                   </p>
                               </div>
                           </li>
                           @endforelse

                       </ul>
                   </div>
               </div>
           </li>
       </ul>
       <!-- Icons Menu End -->

       <!-- Menu Start -->
       <div class="menu-container flex-grow-1">
           <ul id="menu" class="menu">
               <li>
                   <a href="/Dashboard">
                       <i data-acorn-icon="shop" class="icon" data-acorn-size="18"></i>
                       <span class="label">Pantalla Principal</span>
                   </a>
               </li>
               <li>
                   @canAny(['admin.user.index', 'admin.role.index'])
                   <a href="#customers" data-href="{{route('user.index')}}">
                       <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
                       <span class="label">Usuarios</span>
                   </a>
                   @endcan
                   <ul id="customers">
                       @can('admin.user.index')
                       <li>
                           <a href="{{route('user.index')}}">
                               <span class="label">Usuarios</span>
                           </a>
                       </li>
                       @endcan
                   </ul>
               </li>

               <li>
                   @canAny(['admin.products.index','admin.amenities-checks.index'])
                   <a href="#products" data-href="{{route('product.index')}}">
                       <i data-acorn-icon="cupcake" class="icon" data-acorn-size="18"></i>
                       <span class="label">Propiedades</span>
                   </a>
                   @endcan
                   <ul id="products">
                       @can('admin.products.index')
                       <li>
                           <a href="{{route('product.index')}}">
                               <span class="label">Propiedades</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.amenities-checks.index')
                       <li>
                           <a href="{{route('amenities-checks.index')}}">
                               <span class="label">Comodidades</span>
                           </a>
                       </li>
                       @endcan
                   </ul>
               </li>

               <li>
                   @canAny(['admin.contactos.index','admin.negocios.index','admin.tasks.index'])
                   <a href="#crm" data-href="{{route('product.index')}}">
                       <i data-acorn-icon="trend-up" class="icon" data-acorn-size="18"></i>
                       <span class="label">CRM</span>
                   </a>
                   @endcan
                   <ul id="crm">
                       @can('admin.contactos.index')
                       <li>
                           <a href="{{route('contactos.index')}}">
                               <span class="label">Contactos</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.negocios.index')
                       <li>
                           <a href="{{route('negocios.index')}}">
                               <span class="label">Negociaciones</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.tasks.index')
                       <li>
                           <a href="{{route('tasks.index')}}">
                               <span class="label">Tareas</span>
                           </a>
                       </li>
                       @endcan
                   </ul>
               </li>

               <li>
                   @canAny(['admin.posts.index','admin.cat.index','admin.tags.index'])
                   <a href="#blog" data-href="{{route('user.index')}}">
                       <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
                       <span class="label">Blog</span>
                   </a>
                   @endcan
                   <ul id="blog">
                       @can('admin.posts.index')
                       <li>
                           <a href="{{route('posts.index')}}">
                               <span class="label">Post</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.categorias.index')
                       <li>
                           <a href="{{route('cat.index')}}">
                               <span class="label">Categorias</span>
                           </a>
                       </li>
                       @endcan
                       @can('admin.tags.index')
                       <li>
                           <a href="{{route('tags.index')}}">
                               <span class="label">Tags</span>
                           </a>
                       </li>
                       @endcan
                   </ul>
               </li>
               @can('admin.faqs.index')
               <li>
                   <a href="{{route('faqs.index')}}">
                       <i class="fa-regular fa-circle-question icon" data-acorn-size="18"></i>
                       <span class="label">FAQS</span>
                   </a>
               </li>
               @endcan
               @can('admin.testimonios.index')
               <li>
                   <a href="{{route('testimonios.index')}}">
                       <i class="fa-regular fa-comment-dots icon" data-acorn-size="18"></i>
                       <span class="label">Testimonios</span>
                    </a>
                </li>
                @endcan
                @can('admin.pages.index')
                <li>
                    <a href="{{route('pages.index')}}">
                        <i class="fa-regular fa-comment-dots icon" data-acorn-size="18"></i>
                        <span class="label">Pages</span>
                    </a>
                </li>
                @endcan
                <li>
                    @canAny(['admin.paises.index','admin.ciudades.index','admin.estados.index'])
                    <a href="#location" data-href="{{route('product.index')}}">
                        <i class="fa-regular fa-map icon" data-acorn-size="18"></i>
                        <span class="label">Locaciones</span>
                    </a>
                    @endcan
                    <ul id="location">
                        @can('admin.paises.index')
                        <li>
                            <a href="{{route('paises.index')}}">
                                <span class="label">Paises</span>
                            </a>
                        </li>
                        @endcan
                        <li>
                            @can('admin.estados.index')
                            <a href="{{route('estados.index')}}">
                                <span class="label">Estado</span>
                            </a>
                            @endcan
                        </li>
                        @can('admin.ciudades.index')
                        <li>
                            <a href="{{route('city.index')}}">
                                <span class="label">Ciudades</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                <li>
                    @canAny(['admin.setting-generals.index','admin.slides.index','admin.info-webs.index','admin.role.index'])
                    <a href="#storefront" data-href="/Storefront/Home">
                        <i data-acorn-icon="screen" class="icon" data-acorn-size="18"></i>
                        <span class="label">Configuraciones</span>
                    </a>
                    @endcan
                    <ul id="storefront">
                        @can('admin.setting-generals.index')
                        <li>
                            <a href="{{route('setting-generals.index')}}">
                                <span class="label">Generales</span>
                            </a>
                        </li>
                        @endcan
                        @can('admin.slides.index')
                        <li>
                            <a href="{{route('slides.index')}}">
                                <span class="label">Slide Principal</span>
                            </a>
                        </li>
                        @endcan
                        @can('admin.info-webs.index')
                        <li>
                            <a href="{{route('info-webs.index')}}">
                                <span class="label">Información Principal</span>
                            </a>
                        </li>
                        @endcan
                        @can('admin.role.index')
                        <li>
                            <a href="{{route('roles.index')}}">
                                <span class="label">Roles</span>
                            </a>
                        </li>
                        @endcan
                   </ul>
               </li>
           </ul>
       </div>
       <!-- Menu End -->
       @else
       <a href="{{ route('home') }}" class="btn">Volver a inicio</a>
       @endif
       <!-- Mobile Buttons Start -->
       <div class="mobile-buttons-container">
           <!-- Menu Button Start -->
           <a href="#" id="mobileMenuButton" class="menu-button">
               <i data-acorn-icon="menu"></i>
           </a>
           <!-- Menu Button End -->
       </div>
       <!-- Mobile Buttons End -->
   </div>
   <div class="nav-shadow"></div>
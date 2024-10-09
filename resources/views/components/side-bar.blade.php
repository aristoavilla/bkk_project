<!-- component -->
<div class="block" x-data="{ isOn: false, screenWidth: window.innerWidth }" x-init="window.addEventListener('resize', () => { screenWidth = window.innerWidth })">
    
  {{-- Small device sidebar --}}
    <div class=" bg-gray-900 flex xl:hidden justify-between w-full p-6 items-center">
      <div class="flex justify-between  items-center space-x-3">
        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 17H0H1ZM7 17H6H7ZM17 27V28V27ZM27 17H28H27ZM17 0C12.4913 0 8.1673 1.79107 4.97918 4.97918L6.3934 6.3934C9.20644 3.58035 13.0218 2 17 2V0ZM4.97918 4.97918C1.79107 8.1673 0 12.4913 0 17H2C2 13.0218 3.58035 9.20644 6.3934 6.3934L4.97918 4.97918ZM0 17C0 21.5087 1.79107 25.8327 4.97918 29.0208L6.3934 27.6066C3.58035 24.7936 2 20.9782 2 17H0ZM4.97918 29.0208C8.1673 32.2089 12.4913 34 17 34V32C13.0218 32 9.20644 30.4196 6.3934 27.6066L4.97918 29.0208ZM17 34C21.5087 34 25.8327 32.2089 29.0208 29.0208L27.6066 27.6066C24.7936 30.4196 20.9782 32 17 32V34ZM29.0208 29.0208C32.2089 25.8327 34 21.5087 34 17H32C32 20.9782 30.4196 24.7936 27.6066 27.6066L29.0208 29.0208ZM34 17C34 12.4913 32.2089 8.1673 29.0208 4.97918L27.6066 6.3934C30.4196 9.20644 32 13.0218 32 17H34ZM29.0208 4.97918C25.8327 1.79107 21.5087 0 17 0V2C20.9782 2 24.7936 3.58035 27.6066 6.3934L29.0208 4.97918ZM17 6C14.0826 6 11.2847 7.15893 9.22183 9.22183L10.636 10.636C12.3239 8.94821 14.6131 8 17 8V6ZM9.22183 9.22183C7.15893 11.2847 6 14.0826 6 17H8C8 14.6131 8.94821 12.3239 10.636 10.636L9.22183 9.22183ZM6 17C6 19.9174 7.15893 22.7153 9.22183 24.7782L10.636 23.364C8.94821 21.6761 8 19.3869 8 17H6ZM9.22183 24.7782C11.2847 26.8411 14.0826 28 17 28V26C14.6131 26 12.3239 25.0518 10.636 23.364L9.22183 24.7782ZM17 28C19.9174 28 22.7153 26.8411 24.7782 24.7782L23.364 23.364C21.6761 25.0518 19.3869 26 17 26V28ZM24.7782 24.7782C26.8411 22.7153 28 19.9174 28 17H26C26 19.3869 25.0518 21.6761 23.364 23.364L24.7782 24.7782ZM28 17C28 14.0826 26.8411 11.2847 24.7782 9.22183L23.364 10.636C25.0518 12.3239 26 14.6131 26 17H28ZM24.7782 9.22183C22.7153 7.15893 19.9174 6 17 6V8C19.3869 8 21.6761 8.94821 23.364 10.636L24.7782 9.22183ZM10.3753 8.21913C6.86634 11.0263 4.86605 14.4281 4.50411 18.4095C4.14549 22.3543 5.40799 26.7295 8.13176 31.4961L9.86824 30.5039C7.25868 25.9371 6.18785 21.9791 6.49589 18.5905C6.80061 15.2386 8.46699 12.307 11.6247 9.78087L10.3753 8.21913ZM23.6247 25.7809C27.1294 22.9771 29.1332 19.6127 29.4958 15.6632C29.8549 11.7516 28.5904 7.41119 25.8682 2.64741L24.1318 3.63969C26.7429 8.20923 27.8117 12.1304 27.5042 15.4803C27.2001 18.7924 25.5372 21.6896 22.3753 24.2191L23.6247 25.7809Z" fill="white" />
        </svg>
        <a href="/" class="text-2xl leading-6 text-white font-anek font-bold"><i>BKK SKADA</i></a>
      </div>
      <div aria-label="toggler" class="flex justify-center items-center">
  
        {{-- Open Button --}}
        <button @click="isOn = !isOn" aria-label="open" id="open" class="focus:outline-none focus:ring-2">
          {{-- If the isOn is true, then the hamburger menu is hidden (Default is false) --}}
          <svg :class="{'hidden': isOn, 'block': !isOn }" class="block" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M4 12H20" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M4 18H20" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          {{-- If the isOn is false, then the X menu is hidden --}}
          <svg :class="{'block': isOn, 'hidden': !isOn }" class="hidden" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 6L6 18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M6 6L18 18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
  
        {{-- Close Button --}}
        {{-- <button aria-label="close" id="close" onclick="showNav(true)" class="hidden focus:outline-none focus:ring-2">
        </button> --}}
      </div>
    </div>
    {{-- End of the small device sidebar --}}
  
    {{-- This is the main sidebar content. It contains navigations --}}
    <div :class="{'hidden': !isOn && screenWidth < 1280, 'block': isOn || screenWidth >= 1280}" 
      id="Main" 
      class="transform xl:translate-x-0 ease-in-out transition duration-500 flex justify-start items-start h-full w-full xl:w-60 bg-gray-900 flex-col">
      <div class="hidden xl:flex justify-start p-6 items-center space-x-3">
        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 17H0H1ZM7 17H6H7ZM17 27V28V27ZM27 17H28H27ZM17 0C12.4913 0 8.1673 1.79107 4.97918 4.97918L6.3934 6.3934C9.20644 3.58035 13.0218 2 17 2V0ZM4.97918 4.97918C1.79107 8.1673 0 12.4913 0 17H2C2 13.0218 3.58035 9.20644 6.3934 6.3934L4.97918 4.97918ZM0 17C0 21.5087 1.79107 25.8327 4.97918 29.0208L6.3934 27.6066C3.58035 24.7936 2 20.9782 2 17H0ZM4.97918 29.0208C8.1673 32.2089 12.4913 34 17 34V32C13.0218 32 9.20644 30.4196 6.3934 27.6066L4.97918 29.0208ZM17 34C21.5087 34 25.8327 32.2089 29.0208 29.0208L27.6066 27.6066C24.7936 30.4196 20.9782 32 17 32V34ZM29.0208 29.0208C32.2089 25.8327 34 21.5087 34 17H32C32 20.9782 30.4196 24.7936 27.6066 27.6066L29.0208 29.0208ZM34 17C34 12.4913 32.2089 8.1673 29.0208 4.97918L27.6066 6.3934C30.4196 9.20644 32 13.0218 32 17H34ZM29.0208 4.97918C25.8327 1.79107 21.5087 0 17 0V2C20.9782 2 24.7936 3.58035 27.6066 6.3934L29.0208 4.97918ZM17 6C14.0826 6 11.2847 7.15893 9.22183 9.22183L10.636 10.636C12.3239 8.94821 14.6131 8 17 8V6ZM9.22183 9.22183C7.15893 11.2847 6 14.0826 6 17H8C8 14.6131 8.94821 12.3239 10.636 10.636L9.22183 9.22183ZM6 17C6 19.9174 7.15893 22.7153 9.22183 24.7782L10.636 23.364C8.94821 21.6761 8 19.3869 8 17H6ZM9.22183 24.7782C11.2847 26.8411 14.0826 28 17 28V26C14.6131 26 12.3239 25.0518 10.636 23.364L9.22183 24.7782ZM17 28C19.9174 28 22.7153 26.8411 24.7782 24.7782L23.364 23.364C21.6761 25.0518 19.3869 26 17 26V28ZM24.7782 24.7782C26.8411 22.7153 28 19.9174 28 17H26C26 19.3869 25.0518 21.6761 23.364 23.364L24.7782 24.7782ZM28 17C28 14.0826 26.8411 11.2847 24.7782 9.22183L23.364 10.636C25.0518 12.3239 26 14.6131 26 17H28ZM24.7782 9.22183C22.7153 7.15893 19.9174 6 17 6V8C19.3869 8 21.6761 8.94821 23.364 10.636L24.7782 9.22183ZM10.3753 8.21913C6.86634 11.0263 4.86605 14.4281 4.50411 18.4095C4.14549 22.3543 5.40799 26.7295 8.13176 31.4961L9.86824 30.5039C7.25868 25.9371 6.18785 21.9791 6.49589 18.5905C6.80061 15.2386 8.46699 12.307 11.6247 9.78087L10.3753 8.21913ZM23.6247 25.7809C27.1294 22.9771 29.1332 19.6127 29.4958 15.6632C29.8549 11.7516 28.5904 7.41119 25.8682 2.64741L24.1318 3.63969C26.7429 8.20923 27.8117 12.1304 27.5042 15.4803C27.2001 18.7924 25.5372 21.6896 22.3753 24.2191L23.6247 25.7809Z" fill="white" />
        </svg>
        <a href="/" class="text-2xl leading-6 text-white font-bold font-anek"><i>BKK SKADA</i></a>
      </div>
      <div class="mt-6 flex flex-col justify-start items-center px-4 w-full border-gray-600 border-b space-y-3 pb-5 ">
        <a href="/dashboard" class="{{ request()->is('dashboard') ? ' bg-slate-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} flex justify-start items-center space-x-6 w-full focus:outline-none  focus:text-indigo-400  text-white rounded p-2">
          <svg class="fill-stroke " width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 4H5C4.44772 4 4 4.44772 4 5V9C4 9.55228 4.44772 10 5 10H9C9.55228 10 10 9.55228 10 9V5C10 4.44772 9.55228 4 9 4Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M19 4H15C14.4477 4 14 4.44772 14 5V9C14 9.55228 14.4477 10 15 10H19C19.5523 10 20 9.55228 20 9V5C20 4.44772 19.5523 4 19 4Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M9 14H5C4.44772 14 4 14.4477 4 15V19C4 19.5523 4.44772 20 5 20H9C9.55228 20 10 19.5523 10 19V15C10 14.4477 9.55228 14 9 14Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M19 14H15C14.4477 14 14 14.4477 14 15V19C14 19.5523 14.4477 20 15 20H19C19.5523 20 20 19.5523 20 19V15C20 14.4477 19.5523 14 19 14Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p class="text-base leading-4">Dashboard</p>
        </a>
        <a href="{{ route('careers.index') }}" class="{{ request()->is('dashboard/careers') ? ' bg-slate-700 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white'}} flex jusitfy-start items-center w-full space-x-6 focus:outline-none focus:text-indigo-400 rounded p-2 h-10 mb-1">
          <i class="fa-solid fa-pager ms-1"></i>
          <p class="text-base leading-4 ">Careers</p>
        </a>
        <a href="{{ route('alumnus.index') }}" class="{{ request()->is('dashboard/alumnus') ? ' bg-slate-700 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white'}} flex justify-start items-center w-full space-x-6 focus:outline-none hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded p-2 h-10 md:w-52 mb-1">
          <i class="fa-solid fa-graduation-cap"></i>
          <p class="text-base leading-4">Alumnus</p>
        </a>
        @if (auth()->user()->isStudent())    
        <a href="{{ route('applications.index') }}" class="{{ request()->is('dashboard/applications') ? ' bg-slate-700 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white'}} flex justify-start items-center w-full space-x-6 focus:outline-none hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded p-2 h-10 md:w-52 mb-1">
          <i class="fa-solid fa-file"></i>
          <p class="text-base leading-4">My Applications</p>
        </a>
        @endif
      </div>

      @if (auth()->check() && auth()->user()->isAdmin())
      <div x-data="{isAdminOpen: true}" class="flex flex-col justify-start px-6 border-b border-gray-600 w-full">
        <button @click="isAdminOpen = !isAdminOpen" class="focus:outline-none focus:text-indigo-400 text-left  text-white flex justify-between items-center w-full py-5 space-x-14  ">
          <p class="text-sm leading-5 uppercase tracking-wider">Admin</p>
          <svg id="icon1" :class="{'rotate-180': isAdminOpen, 'rotate-90': !isAdminOpen}" class="transform" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
        <div id="menu1" :class="{'block': isAdminOpen, 'hidden': !isAdminOpen }" class="flex justify-start flex-col w-full md:w-auto items-start pb-1 ">
          <a href="{{ route('users.index') }}" class="{{ request()->is('dashboard/users') ? ' bg-slate-700 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}} flex jusitfy-start items-center w-full space-x-6 focus:outline-none focus:text-indigo-400 rounded p-2 mb-1">
            <svg class="fill-stroke" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M6 21V19C6 17.9391 6.42143 16.9217 7.17157 16.1716C7.92172 15.4214 8.93913 15 10 15H14C15.0609 15 16.0783 15.4214 16.8284 16.1716C17.5786 16.9217 18 17.9391 18 19V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p class="text-base leading-4 ">Users</p>
          </a>
        </div>
      </div>
      <div x-data="{isElseOpen: true}" class="flex flex-col justify-start items-center px-6 border-b border-gray-600 w-full">
        <button @click="isElseOpen = !isElseOpen" class="focus:outline-none focus:text-indigo-400 text-left  text-white flex justify-between items-center w-full py-5 space-x-14  ">
          <p class="text-sm leading-5  uppercase tracking-wider">Applications</p>
          <svg id="icon2" :class="{'rotate-180': isElseOpen, 'rotate-90': !isElseOpen}" class="transform" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
        <div id="menu2" :class="{'block': isElseOpen, 'hidden': !isElseOpen }" class="flex justify-start  flex-col w-full md:w-auto items-start pb-1 ">
          <a href="{{ route('applicants.index') }}" class="{{ request()->is('dashboard/applicants') ? ' bg-slate-700 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white'}} flex justify-start items-center w-full space-x-6 focus:outline-none hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded p-2 h-10 md:w-52 mb-1">
            <i class="fa-solid fa-file-circle-question"></i>
            <p class="text-base leading-4">Applicants</p>
          </a>
        </div>
      </div>
      @endif

    </div>
    {{-- End of main sidebar --}}
</div>
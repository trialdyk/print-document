<div>
    <div class="sidebar">
      <div class="ml-[17px] mb-3 text-xs font-semibold">PAGES</div>
      <ul class="menu mt-3">
        <li>
          <a href="{{Route('dashboard')}}" class="menu-link {{request()->routeIs('dashboard') ? 'active' : ''}}">
            <span class="icon text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13 3v6h8V3m-8 18h8V11h-8M3 21h8v-6H3m0-2h8V3H3v10Z"/></svg></span>
            <span class="text">Dashboard</span>
          </a>
        </li>
        <li>
            <a href="{{Route('classroom.index')}}" class="menu-link {{request()->routeIs('classroom.*') ? 'active' : ''}}">
              <span class="icon text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M23 2H1a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h22a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1m-1 18h-2v-1h-5v1H2V4h20v16M10.29 9.71A1.71 1.71 0 0 1 12 8c.95 0 1.71.77 1.71 1.71c0 .95-.76 1.72-1.71 1.72s-1.71-.77-1.71-1.72m-4.58 1.58c0-.71.58-1.29 1.29-1.29a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28m10 0A1.29 1.29 0 0 1 17 10a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28c-.71 0-1.29-.57-1.29-1.28M20 15.14V16H4v-.86c0-.94 1.55-1.71 3-1.71c.55 0 1.11.11 1.6.3c.75-.69 2.1-1.16 3.4-1.16c1.3 0 2.65.47 3.4 1.16c.49-.19 1.05-.3 1.6-.3c1.45 0 3 .77 3 1.71Z"/></svg></span>
              <span class="text">Kelas</span>
            </a>
        </li>
        <li>
            <a href="{{Route('student.index')}}" class="menu-link {{request()->routeIs('student.*') ? 'active' : ''}}">
              <span class="icon text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M18 10.5V6l-2.11 1.06A3.999 3.999 0 0 1 12 12a3.999 3.999 0 0 1-3.89-4.94L5 5.5L12 2l7 3.5v5h-1M12 9l-2-1c0 1.1.9 2 2 2s2-.9 2-2l-2 1m2.75-3.58L12.16 4.1L9.47 5.47l2.6 1.32l2.68-1.37M12 13c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-3 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1Z"/></svg></span>
              <span class="text">Siswa</span>
            </a>
        </li>
        <li>
            <a href="{{Route('year.index')}}" class="menu-link {{request()->routeIs('year.*') ? 'active' : ''}}">
              <span class="icon text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 11h2v2H7v-2m14-6v14c0 1.11-.89 2-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h1V1h2v2h8V1h2v2h1a2 2 0 0 1 2 2M5 7h14V5H5v2m14 12V9H5v10h14m-4-6v-2h2v2h-2m-4 0v-2h2v2h-2m-4 2h2v2H7v-2m8 2v-2h2v2h-2m-4 0v-2h2v2h-2Z"/></svg></span>
              <span class="text">Tahun Ajaran</span>
            </a>
        </li>
        <li>
          <a href="{{Route('print.index')}}" class="menu-link {{request()->routeIs('print.index') ? 'active' : ''}}">
            <span class="icon text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 11h2v2H7v-2m14-6v14c0 1.11-.89 2-2 2H5a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h1V1h2v2h8V1h2v2h1a2 2 0 0 1 2 2M5 7h14V5H5v2m14 12V9H5v10h14m-4-6v-2h2v2h-2m-4 0v-2h2v2h-2m-4 2h2v2H7v-2m8 2v-2h2v2h-2m-4 0v-2h2v2h-2Z"/></svg></span>
            <span class="text">Cetak Kartu</span>
          </a>
       </li>
       <li>
          <a href="{{Route('rekap-spp.index')}}" class="menu-link {{request()->routeIs('rekap-spp.index') ? 'active' : ''}}">
            <span class="icon text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21 4H3a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h18a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2M3 19V6h8v13H3m18 0h-8V6h8v13m-7-9.5h6V11h-6V9.5m0 2.5h6v1.5h-6V12m0 2.5h6V16h-6v-1.5Z"/></svg></span>
            
            <span class="text">Rekap Spp</span>
          </a>
       </li>
        {{-- <li>
          <a class="menu-link">
            <span class="icon"><IconUser /></span>
            <span class="text font-semibold">Users</span>
            <span class="arrow"><IconArrowDown /></span>
          </a>
          <ul class="submenu">
            <li><a href="#" class="submenu-link">User List</a></li>
            <li><a href="#" class="submenu-link">Add User</a></li>
          </ul>
        </li> --}}
      </ul>
    </div>
</div>
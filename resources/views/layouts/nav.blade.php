<nav class="w-1/4 mx-auto p-2">
  <div class="flex w-full bg-white px-6 py-2 justify-between rounded">
    <div>
        <ul class="flex list-style-none mr-auto">
          <li class="p-1">
            <a href="{{ route('calendar')}}" class=""><span class="">Apb</span></a>
          </li>
    </div>
    <div>
        <ul class="flex list-style-none mr-auto">
            @auth()
              @if (auth()->user()->is_admin == true)
                  <li class="py-1 px-2">
                    <a href="{{ route('unavailable.index') }}">Unavailable</a>
                  </li>
              @endif
            <li class="py-1 px-2">
              <a href="{{ route('logout') }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
              </a> 
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
            @endauth
            @guest
            <li class="p-1">
              <a href="{{ route('login') }}">Login</a>
            </li>
            @endguest
          </li>

        </ul>
        {{-- @auth
        <div class="mt-2 text-xs items-center flex justify-end">
          <div>
            hello, {{ auth()->user()->name }}
          </div>
        </div> 
        @endauth --}}
    </div>
  </div>
  @auth
  <div class="mt-2 text-xs items-center flex justify-end">
    <div>
      hello, {{ auth()->user()->name }}
    </div>
  </div>  
  @endauth
</nav>
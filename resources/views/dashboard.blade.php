
                    @role('admin')
                    <x-app-layout>
                        <x-slot name="header">

                        </x-slot>

                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="p-6 bg-white border-b border-gray-200">
                    <a class="btn btn-success" href="{{url('ggNew')}}" role="button" id="dateTest">Перейти в панель администратора</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
                @endrole


            @role('teacher')
            <x-app-layout>
                <x-slot name="header">

                </x-slot>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                <a class="btn btn-success" href="{{url('myDisciplins')}}" role="button" id="dateTest">Перейти к журналу</a>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
            @endrole
            @role('student')
            <x-app-layout>
                <x-slot name="header">

                </x-slot>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">

            <a class="btn btn-success" href="{{url('myGroup')}}" role="button" id="dateTest">Перейти к  своему журналу</a>
        </div>
    </div>
</div>
</div>
</x-app-layout>
            @endrole

     @role('deleted')

          <span> Указанный пользователь не существует</span>
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Выход') }}
            </x-dropdown-link>
        </form>

    @endrole

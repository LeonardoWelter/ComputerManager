<div id="alert" class="absolute z-40 top-0 right-0 mt-16 w-56 cursor-pointer" onclick="document.getElementById('alert').hidden = true">
            @switch($type)
                @case('error')
                <div class="flex text-white rounded shadow-lg p-4 m-2 bg-red-600">
                    @break
                @case('warning')
                <div class="flex text-white rounded shadow-lg p-4 m-2 bg-orange-600">
                    @break
                @case('info')
                <div class="flex text-white rounded shadow-lg p-4 m-2 bg-blue-400">
                    @break
                @case('success')
                <div class="flex text-white rounded shadow-lg p-4 m-2 bg-green-400">
                    @break
            @endswitch
                
        <div class="align-middle mt-1 text-2xl">
            @switch($type)
                @case('error')
                    <i class="fas fa-times"></i>
                    @break
                @case('warning')
                    <i class="fas fa-exclamation-triangle"></i>
                    @break
                @case('info')
                    <i class="fas fa-info"></i>
                    @break
                @case('success')
                    <i class="fas fa-check"></i>
                    @break
            @endswitch
        </div>
        <div class="ml-4">
            <h1 class="font-black">{{ $title }}</h1>
            <p>{{ $message }}</p>
        </div>
    </div>
</div>
<div class="hv-item-child">
    <!-- Key component -->
    <div class="hv-item">

        <div class="hv-item-parent">
            <div class="person">
                <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="">
                <p class="name">
                    {{$downLine->name}}
                </p>
            </div>
        </div>
        @foreach ($downLine->downLines as $downLine)
            <div class="hv-item-children">

                @include('partials',$downLine)

            </div>
        @endforeach
    </div>
</div>

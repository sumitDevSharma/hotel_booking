<div class="genration-box dash-card d-flex flex-wrap align-items-center more-space">
    <h4>Generation Tree</h4>
    <div class="scroll-content" onmousedown="startDrag(event)">
        <div id="tree" class="tree">
            <ul>
                <li><span><img src="{{ asset($themeTrue . 'images/avatar1.png')}}" alt="" class="img-avatar"><p class="text-white">{{sortWalletAddress($user->wallet_address,10)}}</p></span>
                    <ul>
                        @foreach($childs as $child)
                        <li>
                            <span><a href="{{route('user.team.tree', $child['user_id'])}}"><img src="{{ asset($themeTrue . 'images/avatar1.png')}}" alt="" class="img-avatar"></a><p class="text-white">{{sortWalletAddress($child['wallet_address'],10)}}</p></span>
                        </li>
                        @endforeach
                        <li>
                            <span><img src="{{ asset($themeTrue . 'images/avatar-empty11.png')}}" alt="" class="img-avatar"> <p class="text-white">Yet to place</p></span>
                        </li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
</div>

@push('script')
<script>
  let isDragging = false;
  let initialX;

  function startDrag(event) {
    isDragging = true;
    initialX = event.clientX;

    document.addEventListener('mousemove', handleDrag);
    document.addEventListener('mouseup', stopDrag);
  }

  function handleDrag(event) {
    if (!isDragging) return;

    const deltaX = event.clientX - initialX;
    const scrollableElement = document.querySelector('.scroll-content');
    scrollableElement.scrollLeft -= deltaX;

    initialX = event.clientX;
  }

  function stopDrag() {
    isDragging = false;

    document.removeEventListener('mousemove', handleDrag);
    document.removeEventListener('mouseup', stopDrag);
  }
</script>
@endpush
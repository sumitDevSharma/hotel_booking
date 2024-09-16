@if(!empty($binary_tree))
<style>
  

  #tree {
    zoom: 65%;
  }

</style>
<div class="genration-box dash-card d-flex flex-wrap align-items-center more-space">
    <h4>Matrix 2x2</h4>
    <div class="scroll-content" onmousedown="startDrag(event)">
        <div id="tree" class="tree">
            <ul class="justify-content-center">
                <li><span><img src="{{ asset($themeTrue . 'images/avatar1.png')}}" alt="" class="img-avatar"><p class="text-white">{{sortWalletAddress($user->wallet_address,10)}}</p></span>
                   
                    @if(!empty($binary_tree['client_tree']))
                    <ul>
                        @foreach($binary_tree['client_tree']['level1'] as $level1)
                            <li>
                              <span><a href="{{route('user.team.matrix-2x2',$level1['wallet_address'])}}"><img src="{{ asset($themeTrue . 'images/avatar1.png')}}" alt="" class="img-avatar"><p class="text-white">{{sortWalletAddress($level1['wallet_address'],10)}}</p></a></span>
                             
                              
                                @if(!empty($binary_tree['client_tree']['level2'][$level1['wallet_address']]->toArray()))
                                <ul>

                                    @foreach($binary_tree['client_tree']['level2'][$level1['wallet_address']] as $level2)
                                        <li>
                                          <span><a href="{{route('user.team.matrix-2x2',$level2['wallet_address'])}}"><img src="{{ asset($themeTrue . 'images/avatar1.png')}}" alt="" class="img-avatar"><p class="text-white">{{sortWalletAddress($level2['wallet_address'],10)}}</p></a></span>
                                          
                                            
                                            @if(!empty($binary_tree['client_tree']['level3'][$level1['wallet_address']][$level2['wallet_address']]->toArray()))
                                            <ul>
                                                @foreach($binary_tree['client_tree']['level3'][$level1['wallet_address']][$level2['wallet_address']] as $level3)
                                                    <li>
                                                      <span><a href="{{route('user.team.matrix-2x2',$level3['wallet_address'])}}"><img src="{{ asset($themeTrue . 'images/avatar1.png')}}" alt="" class="img-avatar"><p class="text-white">{{sortWalletAddress($level3['wallet_address'],10)}}</p></a></span>
                                                    </li>
                                                @endforeach
                                                @if(count($binary_tree['client_tree']['level3'][$level1['wallet_address']][$level2['wallet_address']]) < 2)
                                                    @foreach(range(count($binary_tree['client_tree']['level3'][$level1['wallet_address']][$level2['wallet_address']]),1) as $index)
                                                      <li>
                                                        <span><img src="{{ asset($themeTrue . 'images/avatar-empty11.png')}}" alt="" class="img-avatar
                                                        "><p class="text-white">Empty</p></span>
                                                      </li>
                                                    @endforeach
                                                @endif
                                                </ul>
                                            @endif

                                          
                                        </li>
                                    @endforeach
                                    @if(count($binary_tree['client_tree']['level2'][$level1['wallet_address']]->toArray()) < 2)
                                        @foreach(range(count($binary_tree['client_tree']['level2'][$level1['wallet_address']]),1) as $index)
                                          <li>
                                            <span><img src="{{ asset($themeTrue . 'images/avatar-empty11.png')}}" alt="" class="img-avatar"><p class="text-white">Empty</p></span>
                                          </li>
                                        @endforeach
                                    @endif
                                    </ul>
                                @endif
                           
                            </li>
                        @endforeach
                        @if(count($binary_tree['client_tree']['level1']) < 2)
                            @foreach(range($binary_tree['client_tree']['level1'],1) as $index)
                              <li>
                                <span><img src="{{ asset($themeTrue . 'images/avatar-empty11.png')}}" alt="" class="img-avatar"><p class="text-white">Empty</p></span>
                              </li>
                            @endforeach
                        @endif
                        </ul>
                    @endif
                               
                              
                        
                      
                       
                    
                </li>
                
            </ul>
        </div>
    </div>
</div>
@endif

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
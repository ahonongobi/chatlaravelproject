<h5>Messagerie Instantanée</h5>
<table id="tableau" class="table">
 <tbody>
                       @foreach($topics as $topic)
                        
                        <tr class="table-row">
                            
                            <td class="table-text">
                            	
                                
                                <div class="user_img"><img src="/uploads/avatars/{{$topic->user->avatar}}" width="48" height="48" alt="User"><br><small>{{$topic->user->name}}</small></div> <br>
											   <div id="loadmessages" class="notification_desc">
												<p style="background-color: blue;border-radius: 5px; display: inline-block;color: white;">{{$topic->content}} </p>
												
												</div>
                                

                            </td>
                            <td>
                            	 <i style="color: blue;height: 100px;" class="pull-left fa fa-thumbs-up icon-rounded"></i>
                            </td>
                            <td class="march">
                                
                            </td>
                          
                             <td>
                               <i class="fa fa-star-half-o icon-state-warning"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


 
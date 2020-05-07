@extends('layouts.app')



@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/table.css') }}" rel="stylesheet">

<ul style="list-style-type: none;
  margin: 0;
  padding:0px;
  overflow: hidden;
  background-color: #333;"> 

<li style="float:left; padding-left:5px; padding-top:5px;">
  @if(empty($team->image ))
    <img src="/images/sportsballs.png" alt="Team Logo" 
        width="40px" height="40px" class="rounded-circle"/>
  @else
    <img src="{{asset('images/'. $team->image)}}" alt="Team Logo" 
        width="40px" height="40px" class="rounded-circle"/>                    
    @endif
  </li>
  <li style="float:left"><a class="active" href="{{route('team.show' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Home</a></li>
  <li style="float:left"><a href="{{route('calendar' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Calendar</a></li>
  <li style="float:left"><a href="{{route('roster' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Lineup</a></li>
  <li style="float:left"><a href="{{route('playIndex' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Playbook</a></li>
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
  <li style="float:left"><a href="{{route('quizIndex' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Quizzes</a></li>
  <li style="float:left"><a href="{{route('members' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Membership</a></li>
</ul>

<div class="container-fluid">
	<div class="row pt-2">
        <div class="col-md-4">
            <h3 class="text-left pl-2">
            <a href="/statistic/team/{{$team->id}}/game/{{$game->id}}"  tabindex="-1" role="button" ><i class="fa fa-arrow-circle-o-left" style="color:#000000" aria-hidden="true"></i></a>
            </h3>
        </div>
		<div class="col-md-4">
			<h3 class="text-center">
				<u>{{$team->name}} Vs {{$game->opponent}}</u>
                <h3 class="text-center">
                <u>{{$game->season->year}}</u>
                </h3>
			</h3>
		</div>
        <div class="col-md-4">
        </div>
	</div>
	<div class="row">
		<div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Goals</th>
                <th scope="col">Goals Conceded</th>
                <th scope="col">Assists</th>
                <th scope="col">Shots</th>
                <th scope="col">Shots on Target</th>
                <th scope="col">Passes</th>
                <th scope="col">Dribbles</th>
                <th></th>
                </tr>
                </thead>
        <tbody style="height:50px;">
            <tr>
            <td>
            <textarea id="gol" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->goals}}"></textarea>
            </td>
            <td>
            <textarea id="goc" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->goalsCon}}"></textarea>
            </td>
            <td>
            <textarea id="ass" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->assists}}"></textarea>
            </td>
            <td>
            <textarea id="sho" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->shots}}"></textarea>
            </td>
            <td>
            <textarea id="sot" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->shotOT}}"></textarea>
            </td>
            <td>
            <textarea id="pas" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->passes}}"></textarea>
            </td>
            <td>
            <textarea id="dri" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->dribbles}}"></textarea>
            </td>
            <td>
            <button type="submit"  onClick="updateOStat()">Update Stats</button>
            </td>
            </tr>
</tbody>
</tbody>   
</table> 

		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Crosses</th>
                <th scope="col">Tackles</th>
                <th scope="col">Headers Won</th>
                <th scope="col">Clearances</th>
                <th scope="col">Interceptions</th>
                <th scope="col">Saves</th>
                <th scope="col">Fouls</th>
                <th></th>
                </tr>
                </thead>
        <tbody style="height:50px;">
       
            <tr>
            <td>
            <textarea id="cro" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->crosses}}"></textarea>
            </td>
            <td>
            <textarea id="tac" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->tackles}}"></textarea>
            </td>
            <td>
            <textarea id="hea" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->headers}}"></textarea>
            </td>
            <td>
            <textarea id="cle" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->clearances}}"></textarea>
            </td>
            <td>
            <textarea id="int" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->interceptions}}"></textarea>
            </td>
            <td>
            <textarea id="sav" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->saves}}"></textarea>
            </td>
            <td>
            <textarea id="pen" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->penalties}}"></textarea>
            </td>
            <td>
            <button type="submit"  onClick="updateDStat()">Update Stats</button>
            </td>
            
            </tr>
       
</tbody>
        </table> 

		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4">
			<h4>
				Goals
			</h4>
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Goals</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}/training">{{$usg->user->name}}</a></td>
            <td>{{$usg->goals}}</td>
            <td>
            <?php echo '<textarea id="gol'.$usg->id.'" name="goals"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->goals.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="goals" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Assists
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Assists</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}/training">{{$usg->user->name}}</a></td>
            <td>{{$usg->assists}}</td>
            <td>
            <?php echo '<textarea id="ass'.$usg->id.'" name="assists"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->assists.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="assists" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Shots
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Shots</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}/training">{{$usg->user->name}}</a></td>
            <td>{{$usg->shots}}</td>
            <td>
            <?php echo '<textarea id="sho'.$usg->id.'" name="shots" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->shots.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="shots" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
    </table> 

		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h4>
				Shots on Target
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Shots OT</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}/training">{{$usg->user->name}}</a></td>
            <td>{{$usg->shotOT}}</td>
            <td>
            <?php echo '<textarea id="sot'.$usg->id.'" name="shotOT"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->shotOT.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="shotOT" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Passes
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Passes</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
            <tbody>
            @foreach ($game->usergames as $usg)
                <tr>
                <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}/training">{{$usg->user->name}}</a></td>
                <td>{{$usg->passes}}</td>
                <td>
            <?php echo '<textarea id="pas'.$usg->id.'" name="passes"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->passes.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="passes" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
                </tr>
            @endforeach
</tbody>   
        </table> 

		</div>
		<div class="col-md-4">
            <h4>
				Crosses
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Crosses</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
            @foreach ($game->usergames as $usg)
                <tr>
                <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}/training">{{$usg->user->name}}</a></td>
                <td>{{$usg->crosses}}</td>
                <td>
            <?php echo '<textarea id="cro'.$usg->id.'" name="crosses"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->crosses.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="crosses" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
                </tr>
            @endforeach
</tbody>   
        </table> 

	    </div>
	</div>
	<div class="row">
		<div class="col-md-4">
        <h4>
				Successful Dribbles
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Dribbles</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($game->usergames as $usg)
                    <tr>
                    <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}/training">{{$usg->user->name}}</a></td>
                    <td>{{$usg->dribbles}}</td>
                    <td>
                    <?php echo '<textarea id="dri'.$usg->id.'" name="dribbles"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->dribbles.'"></textarea>'; ?>
                    </td>
                    <td>
                    <?php echo '<button id="'.$usg->id.'" name="dribbles" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
                    </td>
                    </tr>
                @endforeach
                </tbody>   
            </table>
		</div>
		<div class="col-md-4">
        <h4>
				Tackles
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Tackles</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($game->usergames as $usg)
                    <tr>
                    <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}/training">{{$usg->user->name}}</a></td>
                    <td>{{$usg->tackles}}</td>
                    <td>
                    <?php echo '<textarea id="tac'.$usg->id.'" name="tackles"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->tackles.'"></textarea>'; ?>
                    </td>
                    <td>
                    <?php echo '<button id="'.$usg->id.'" name="tackles" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
                    </td>
                    </tr>
                @endforeach
                </tbody>   
            </table>
		</div>
		<div class="col-md-4">
        <h4>
				Interceptions
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Interceptions</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($game->usergames as $usg)
                    <tr>
                    <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}/training">{{$usg->user->name}}</a></td>
                    <td>{{$usg->interceptions}}</td>
                    <td>
                    <?php echo '<textarea id="int'.$usg->id.'" name="interceptions"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->interceptions.'"></textarea>'; ?>
                    </td>
                    <td>
                    <?php echo '<button id="'.$usg->id.'" name="interceptions" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
                    </td>
                    </tr>
                @endforeach
                </tbody>   
            </table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h4>
				Clearances
			</h4>
            
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Clearances</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}/training">{{$usg->user->name}}</a></td>
            <td>{{$usg->clearances}}</td>
            <td>
            <?php echo '<textarea id="cle'.$usg->id.'" name="clearances"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->clearances.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="clearances" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Headers Won
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Headers</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($game->usergames as $usg)
                    <tr>
                    <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}/training">{{$usg->user->name}}</a></td>
                    <td>{{$usg->headers}}</td>
                    <td>
                    <?php echo '<textarea id="hea'.$usg->id.'" name="headers"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->headers.'"></textarea>'; ?>
                    </td>
                    <td>
                    <?php echo '<button id="'.$usg->id.'" name="headers" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
                    </td>
                    </tr>
                @endforeach

                </tbody>
            </table> 
		</div>
		<div class="col-md-4">
			<h4>
				Saves
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Saves</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($game->usergames as $usg)
                    <tr>
                    <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}/training">{{$usg->user->name}}</a></td>
                    <td>{{$usg->saves}}</td>
                    <td>
                    <?php echo '<textarea id="sav'.$usg->id.'" name="saves"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->saves.'"></textarea>'; ?>
                    </td>
                    <td>
                    <?php echo '<button id="'.$usg->id.'" name="saves" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table> 
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<h4>
				Fouls
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Fouls</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($game->usergames as $usg)
                    <tr>
                    <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}/training">{{$usg->user->name}}</a></td>
                    <td>{{$usg->penalties}}</td>
                    <td>
                    <?php echo '<textarea id="pen'.$usg->id.'" name="penalties"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->penalties.'"></textarea>'; ?>
                    </td>
                    <td>
                    <?php echo '<button id="'.$usg->id.'" name="penalties" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table> 
		</div>
		<div class="col-md-4">
            <h4>
				Bookings
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Bookings</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($game->usergames as $usg)
                    <tr>
                    <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}/training">{{$usg->user->name}}</a></td>
                    <td>{{$usg->bookings}}</td>
                    <td>
                    <?php echo '<textarea id="boo'.$usg->id.'" name="bookings"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->bookings.'"></textarea>'; ?>
                    </td>
                    <td>
                    <?php echo '<button id="'.$usg->id.'" name="bookings" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table> 
		</div>

		<div class="col-md-4">
		</div>
	</div>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
var game = <?php echo json_encode($game->id); ?>;
var team = <?php echo json_encode($game->team->id); ?>;


function updateStat(ugid,type){


     if(type == "goals"){
        var amount = document.getElementById("gol"+ugid).value;
    }else if(type == "assists"){
        var amount = document.getElementById("ass"+ugid).value;
    }else if(type == "shots"){
        var amount = document.getElementById("sho"+ugid).value;
    }else if(type == "shotOT"){
        var amount = document.getElementById("sot"+ugid).value;
    }else if(type == "passes"){
        var amount = document.getElementById("pas"+ugid).value;
    }else if(type == "crosses"){
        var amount = document.getElementById("cro"+ugid).value;
    }else if(type == "dribbles"){
        var amount = document.getElementById("dri"+ugid).value;
    }else if(type == "tackles"){
        var amount = document.getElementById("tac"+ugid).value;
    }else if(type == "clearances"){
        var amount = document.getElementById("cle"+ugid).value;
    }else if(type == "interceptions"){
        var amount = document.getElementById("int"+ugid).value;
    }else if(type == "saves"){
        var amount = document.getElementById("sav"+ugid).value;
    }else if(type == "headers"){
        var amount = document.getElementById("hea"+ugid).value;
    }else if(type == "penalties"){
        var amount = document.getElementById("pen"+ugid).value;
    }else if(type == "bookings"){
        var amount = document.getElementById("boo"+ugid).value;
    }
    console.log(amount);

    $.ajax({
        type: 'POST', 
            url: '/game/player/update',
            data: {"_token": "{{ csrf_token() }}", "type":type, "ugid":ugid, "amount":amount},
            success: function (data) {
                alert("Successfully updated player")
                window.location = '/statistic/team/'+team+'/game/'+game+'/update';
            },
            error:function(data){ 
                console.log(data);
                alert("Something went wrong.");
            }
            
    });

};


function updateDStat(){
    var cro = document.getElementById("cro").value;
    var hea = document.getElementById("hea").value;
    var cle = document.getElementById("cle").value;
    var tac = document.getElementById("tac").value;
    var sav = document.getElementById("sav").value;
    var int = document.getElementById("int").value;
    var pen = document.getElementById("pen").value;
    if(!cro){
        cro = <?php echo json_encode($game->crosses); ?>;
    }
    if(!hea){
        hea = <?php echo json_encode($game->headers); ?>;
    }
    if(!cle){
        cle = <?php echo json_encode($game->clearances); ?>;
    }
    if(!tac){
        tac = <?php echo json_encode($game->saves); ?>;
    }
    if(!sav){
        sav = <?php echo json_encode($game->tackles); ?>;
    }
    if(!int){
        int = <?php echo json_encode($game->penalties); ?>;
    }
    if(!pen){
        pen = <?php echo json_encode($game->interceptions); ?>;
    }
    

    $.ajax({
      type: 'POST', 
          url: '/game/defence/update',
          data: {"_token": "{{ csrf_token() }}", "game":game, "cro":cro, 
          "hea":hea, "cle":cle, "tac":tac, "sav":sav, "int":int, "pen":pen},
          success: function (data) {
              alert("Successfully updated stats")
              window.location = '/statistic/team/'+team+'/game/'+game+'/update';
          },
          error:function(data){ 
             console.log(data);
             alert("Something went wrong.");
          }
          
  });

};

function updateOStat(){
    var gol = document.getElementById("gol").value;
    var goc = document.getElementById("goc").value;
    var ass = document.getElementById("ass").value;
    var sho = document.getElementById("sho").value;
    var sot = document.getElementById("sot").value;
    var pas = document.getElementById("pas").value;
    var dri = document.getElementById("dri").value;
    
    if(!gol){
        gol = <?php echo json_encode($game->goals); ?>;
    }
    if(!goc){
        goc = <?php echo json_encode($game->goalsCon); ?>;
    }
    if(!ass){
        ass = <?php echo json_encode($game->assists); ?>;
    }
    if(!sho){
        sho = <?php echo json_encode($game->shots); ?>;
    }
    if(!sot){
        sot = <?php echo json_encode($game->shotOT); ?>;
    }
    if(!pas){
        pas = <?php echo json_encode($game->passes); ?>;
    }
    if(!dri){
        dri = <?php echo json_encode($game->dribbles); ?>;
    }
    

    $.ajax({
      type: 'POST', 
          url: '/game/offence/update',
          data: {"_token": "{{ csrf_token() }}", "game":game, "gol":gol, "goc":goc, 
          "ass":ass, "sho":sho, "sot":sot, "pas":pas, "dri":dri},
          success: function (data) {
              alert("Successfully updated stats")
              window.location = '/statistic/team/'+team+'/game/'+game+'/update';
          },
          error:function(data){ 
             console.log(data);
             alert("Something went wrong.");
          }
          
  });

};



</script>

@endsection
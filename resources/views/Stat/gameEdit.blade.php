@extends('layouts.app')



@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/tHighlight.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/video2.css') }}" rel="stylesheet">

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
  <li style="float:left"><a href="#news" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  News</a></li>
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
  <li style="float:left"><a href="{{route('members' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Membership</a></li>
</ul>

<div class="container-fluid">
	<div class="row pt-2">
        <div class="col-md-4">
            <h3 class="text-left pl-2">
            <a href="/statistic/team/{{$team->id}}/game/{{$game->id}}"  tabindex="-1" role="button" ><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></a>
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
			<h4>
				Offence Statistics 
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Passing TD's</th>
                <th scope="col">Passing Yards</th>
                <th scope="col">Rushing TD's</th>
                <th scope="col">Rushing Yards</th>
                <th scope="col">Carries</th>
                <th scope="col">Receptions</th>
                <th scope="col">Receiving Yards</th>
                <th></th>
                </tr>
                </thead>
        <tbody>
            <tr>
            <td>
            <textarea id="ptd" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->passingTD}}"></textarea>
            </td>
            <td>
            <textarea id="pay" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->passingYards}}"></textarea>
            </td>
            <td>
            <textarea id="rtd" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->RushingTD}}"></textarea>
            </td>
            <td>
            <textarea id="ruy" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->RushingYards}}"></textarea>
            </td>
            <td>
            <textarea id="car" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->Carries}}"></textarea>
            </td>
            <td>
            <textarea id="rec" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->Receptions}}"></textarea>
            </td>
            <td>
            <textarea id="rey" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->ReceivingYards}}"></textarea>
            </td>
            <td>
            <button type="submit"  onClick="updateOStat()">Update Stats</button>
            </td>
            </tr>
    </table> 

		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4>
				Defence Statistics
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Allowed Passing TD's</th>
                <th scope="col">Allowed Passing Yards</th>
                <th scope="col">Allowed Rushing TD's</th>
                <th scope="col">Allowed Rushing Yards</th>
                <th scope="col">Tackles</th>
                <th scope="col">Tackles For Loss</th>
                <th scope="col">Sacks</th>
                <th scope="col">Interceptions</th>
                <th scope="col">Pick 6</th>
                <th scope="col">Penalties</th>
                <th></th>
                </tr>
                </thead>
        <tbody>
       
            <tr>
            <td>
            <textarea id="apt" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->allowedPassTD}}"></textarea>
            </td>
            <td>
            <textarea id="apy" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->allowedPassYards}}"></textarea>
            </td>
            <td>
            <textarea id="art" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->allowedRunTD}}"></textarea>
            </td>
            <td>
            <textarea id="ary" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->allowedRunYards}}"></textarea>
            </td>
            <td>
            <textarea id="tac" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->tackles}}"></textarea>
            </td>
            <td>
            <textarea id="tfl" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->tacklesFL}}"></textarea>
            </td>
            <td>
            <textarea id="sac" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->sacks}}"></textarea>
            </td>
            <td>
            <textarea id="int" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->interceptions}}"></textarea>
            </td>
            <td>
            <textarea id="pic" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->pick6}}"></textarea>
            </td>
            <td>
            <textarea id="pen" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="{{$game->penalties}}"></textarea>
            </td>
            <td>
            <button type="submit"  onClick="updateDStat()">Update Stats</button>
            </td>
            
            </tr>
       
    </table> 

		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<h4>
				<u>Offensive Player Statistics</u>
			</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<h4>
				Passing Yards
			</h4>
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Yards</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->passingYards}}</td>
            <td>
            <?php echo '<textarea id="pay'.$usg->id.'" name="passingYards"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->passingYards.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="passingYards" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Passing TDs
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">TDs</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->passingTD}}</td>
            <td>
            <?php echo '<textarea id="ptd'.$usg->id.'" name="passingTD"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->passingTD.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="passingTD" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Rushing Yards
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Yards</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->RushingYards}}</td>
            <td>
            <?php echo '<textarea id="ruy'.$usg->id.'" name="RushingYards"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->RushingYards.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="RushingYards" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
    </table> 

		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h4>
				Rushing TDs
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">TDs</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->RushingTD}}</td>
            <td>
            <?php echo '<textarea id="rut'.$usg->id.'" name="RushingTD"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->RushingTD.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="RushingTD" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Carries
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Carries</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
            <tbody>
            @foreach ($game->usergames as $usg)
                <tr>
                <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
                <td>{{$usg->Carries}}</td>
                <td>
            <?php echo '<textarea id="car'.$usg->id.'" name="Carries"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->Carries.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="Carries" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
                </tr>
            @endforeach
            </table> 

		</div>
		<div class="col-md-4">
            <h4>
				Receptions
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Receptions</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
                <tbody>
            @foreach ($game->usergames as $usg)
                <tr>
                <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
                <td>{{$usg->Receptions}}</td>
                <td>
            <?php echo '<textarea id="rep'.$usg->id.'" name="Receptions"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->Receptions.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="Receptions" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
                </tr>
            @endforeach
            </table> 

	    </div>
	</div>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
        <h4>
				Receiving Yards
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Yards</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->ReceivingYards}}</td>
            <td>
            <?php echo '<textarea id="rey'.$usg->id.'" name="ReceivingYards"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->ReceivingYards.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="ReceivingYards" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
        </table>
		</div>
		<div class="col-md-4">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4>
				<u>Defensive Player Statistics</u>
			</h4>
            
		</div>
	</div>
	<div class="row">
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
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->tackles}}</td>
            <td>
            <?php echo '<textarea id="tac'.$usg->id.'" name="tackles"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->tackles.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="tackles" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Tackle-for-loss
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">TFL</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->tacklesFL}}</td>
            <td>
            <?php echo '<textarea id="tfl'.$usg->id.'" name="tacklesFL"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->tacklesFL.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="tacklesFL" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach

    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Sacks
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Sacks</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->sacks}}</td>
            <td>
            <?php echo '<textarea id="sac'.$usg->id.'" name="sacks"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->sacks.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="sacks" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
    </table> 
		</div>
	</div>

	<div class="row">
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
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->interceptions}}</td>
            <td>
            <?php echo '<textarea id="int'.$usg->id.'" name="interceptions"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->interceptions.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="interceptions" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
    </table> 


		</div>
		<div class="col-md-4">
			<h4>
				Pick6's
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Pick 6's</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->pick6}}</td>
            <td>
            <?php echo '<textarea id="pic'.$usg->id.'" name="pick6" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->pick6.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="pick6" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
    </table> 
		</div>

		<div class="col-md-4">
			<h4>
				Penalties
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Penalties</th>
                <th></th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->penalties}}</td>
            <td>
            <?php echo '<textarea id="pen'.$usg->id.'" name="penalties"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$usg->penalties.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$usg->id.'" name="penalties" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
    </table> 
		</div>
	</div>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
var game = <?php echo json_encode($game->id); ?>;
var team = <?php echo json_encode($game->team->id); ?>;


function updateStat(ugid,type){


    if(type == "penalties"){
        var amount = document.getElementById("pen"+ugid).value;
    }else if(type == "passingTD"){
        var amount = document.getElementById("ptd"+ugid).value;
    }else if(type == "passingYards"){
        var amount = document.getElementById("pay"+ugid).value;
    }else if(type == "RushingTD"){
        var amount = document.getElementById("rut"+ugid).value;
    }else if(type == "RushingYards"){
        var amount = document.getElementById("ruy"+ugid).value;
    }else if(type == "Receptions"){
        var amount = document.getElementById("rep"+ugid).value;
    }else if(type == "Carries"){
        var amount = document.getElementById("car"+ugid).value;
    }else if(type == "ReceivingYards"){
        var amount = document.getElementById("rey"+ugid).value;
    }else if(type == "tacklesFL"){
        var amount = document.getElementById("tfl"+ugid).value;
    }else if(type == "tackles"){
        var amount = document.getElementById("tac"+ugid).value;
    }else if(type == "sacks"){
        var amount = document.getElementById("sac"+ugid).value;
    }else if(type == "interceptions"){
        var amount = document.getElementById("int"+ugid).value;
    }else if(type == "pick6"){
        var amount = document.getElementById("pic"+ugid).value;
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
    var apt = document.getElementById("apt").value;
    var apy = document.getElementById("apy").value;
    var art = document.getElementById("art").value;
    var ary = document.getElementById("ary").value;
    var tac = document.getElementById("tac").value;
    var tfl = document.getElementById("tfl").value;
    var int = document.getElementById("int").value;
    var sac = document.getElementById("sac").value;
    var pic = document.getElementById("pic").value;
    var pen = document.getElementById("pen").value;
    if(!apt){
        apt = <?php echo json_encode($game->allowedPassTD); ?>;
    }
    if(!apy){
        apy = <?php echo json_encode($game->allowedPassYards); ?>;
    }
    if(!art){
        art = <?php echo json_encode($game->allowedRunTD); ?>;
    }
    if(!ary){
        ary = <?php echo json_encode($game->allowedRunYards); ?>;
    }
    if(!tac){
        tac = <?php echo json_encode($game->tacklesFL); ?>;
    }
    if(!tfl){
        tfl = <?php echo json_encode($game->tackles); ?>;
    }
    if(!int){
        int = <?php echo json_encode($game->sacks); ?>;
    }
    if(!sac){
        sac = <?php echo json_encode($game->interceptions); ?>;
    }
    if(!pic){
        pic = <?php echo json_encode($game->pick6); ?>;
    }
    if(!pen){
        pen = <?php echo json_encode($game->penalties); ?>;
    }
    

    $.ajax({
      type: 'POST', 
          url: '/game/defence/update',
          data: {"_token": "{{ csrf_token() }}", "game":game, "apt":apt, "apy":apy, 
          "art":art, "ary":ary, "tac":tac, "tfl":tfl, "int":int, "sac":sac, "pic":pic, "pen":pen},
          success: function (data) {
              alert("Successfully updated defensive stats")
              window.location = '/statistic/team/'+team+'/game/'+game+'/update';
          },
          error:function(data){ 
             console.log(data);
             alert("Something went wrong.");
          }
          
  });

};

function updateOStat(){
    var ptd = document.getElementById("ptd").value;
    var pay = document.getElementById("pay").value;
    var rtd = document.getElementById("rtd").value;
    var ruy = document.getElementById("ruy").value;
    var car = document.getElementById("car").value;
    var rec = document.getElementById("rec").value;
    var rey = document.getElementById("rey").value;
    
    if(!ptd){
        ptd = <?php echo json_encode($game->passingTD); ?>;
    }
    if(!pay){
        pay = <?php echo json_encode($game->passingYards); ?>;
    }
    if(!rtd){
        rtd = <?php echo json_encode($game->RushingTD); ?>;
    }
    if(!ruy){
        ruy = <?php echo json_encode($game->RushingYards); ?>;
    }
    if(!car){
        car = <?php echo json_encode($game->Carries); ?>;
    }
    if(!rec){
        rec = <?php echo json_encode($game->Receptions); ?>;
    }
    if(!rey){
        rey = <?php echo json_encode($game->ReceivingYards); ?>;
    }
    

    $.ajax({
      type: 'POST', 
          url: '/game/offence/update',
          data: {"_token": "{{ csrf_token() }}", "game":game, "ptd":ptd, "pay":pay, 
          "rtd":rtd, "ruy":ruy, "car":car, "rec":rec, "rey":rey},
          success: function (data) {
              alert("Successfully updated offensive stats")
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
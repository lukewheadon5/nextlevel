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
            <a href="/statistic/team/{{$team->id}}/game/{{$game->id}}/training"  tabindex="-1" role="button" ><i class="fa fa-arrow-circle-o-left" style="color:#000000" aria-hidden="true"></i></a>
            </h3>
        </div>
		<div class="col-md-4">
			<h3 class="text-center">
				<u>{{$team->name}} Vs {{$game->opponent}}</u>
                <h3 class="text-center">
                <u>Training {{$game->season->year}}</u>
                </h3>
			</h3>
		</div>
        <div class="col-md-4">
        </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4>
				<u>Offensive Player Training Statistics</u>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->passingYards}}</td>
            <td>
            <?php echo '<textarea id="pay'.$ust->id.'" name="passingYards"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->passingYards.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="passingYards" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->passingTD}}</td>
            <td>
            <?php echo '<textarea id="ptd'.$ust->id.'" name="passingTD"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->passingTD.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="passingTD" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->RushingYards}}</td>
            <td>
            <?php echo '<textarea id="ruy'.$ust->id.'" name="RushingYards"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->RushingYards.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="RushingYards" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->RushingTD}}</td>
            <td>
            <?php echo '<textarea id="rut'.$ust->id.'" name="RushingTD"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->RushingTD.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="RushingTD" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
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
            @foreach ($game->usertrainings as $ust)
                <tr>
                <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
                <td>{{$ust->Carries}}</td>
                <td>
            <?php echo '<textarea id="car'.$ust->id.'" name="Carries"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->Carries.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="Carries" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
                </tr>
            @endforeach
</tbody>   
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
            @foreach ($game->usertrainings as $ust)
                <tr>
                <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
                <td>{{$ust->Receptions}}</td>
                <td>
            <?php echo '<textarea id="rep'.$ust->id.'" name="Receptions"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->Receptions.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="Receptions" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
                </tr>
            @endforeach
</tbody>   
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->ReceivingYards}}</td>
            <td>
            <?php echo '<textarea id="rey'.$ust->id.'" name="ReceivingYards"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->ReceivingYards.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="ReceivingYards" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>   
    </table>
		</div>
		<div class="col-md-4">
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4>
				<u>Defensive Player Training Statistics</u>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->tackles}}</td>
            <td>
            <?php echo '<textarea id="tac'.$ust->id.'" name="tackles"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->tackles.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="tackles" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->tacklesFL}}</td>
            <td>
            <?php echo '<textarea id="tfl'.$ust->id.'" name="tacklesFL"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->tacklesFL.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="tacklesFL" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach

</tbody>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->sacks}}</td>
            <td>
            <?php echo '<textarea id="sac'.$ust->id.'" name="sacks"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->sacks.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="sacks" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->interceptions}}</td>
            <td>
            <?php echo '<textarea id="int'.$ust->id.'" name="interceptions"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->interceptions.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="interceptions" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->pick6}}</td>
            <td>
            <?php echo '<textarea id="pic'.$ust->id.'" name="pick6" style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->pick6.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="pick6" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->penalties}}</td>
            <td>
            <?php echo '<textarea id="pen'.$ust->id.'" name="penalties"style=" resize: none; width: 80px; height: 30px" class="form-control" placeholder="'.$ust->penalties.'"></textarea>'; ?>
            </td>
            <td>
            <?php echo '<button id="'.$ust->id.'" name="penalties" type="submit"  onClick="updateStat(this.id, this.name)">Update</button>'; ?>
            </td>
            </tr>
        @endforeach
</tbody>
    </table> 
		</div>
	</div>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
var game = <?php echo json_encode($game->id); ?>;
var team = <?php echo json_encode($game->team->id); ?>;


function updateStat(utid,type){


    if(type == "penalties"){
        var amount = document.getElementById("pen"+utid).value;
    }else if(type == "passingTD"){
        var amount = document.getElementById("ptd"+utid).value;
    }else if(type == "passingYards"){
        var amount = document.getElementById("pay"+utid).value;
    }else if(type == "RushingTD"){
        var amount = document.getElementById("rut"+utid).value;
    }else if(type == "RushingYards"){
        var amount = document.getElementById("ruy"+utid).value;
    }else if(type == "Receptions"){
        var amount = document.getElementById("rep"+utid).value;
    }else if(type == "Carries"){
        var amount = document.getElementById("car"+utid).value;
    }else if(type == "ReceivingYards"){
        var amount = document.getElementById("rey"+utid).value;
    }else if(type == "tacklesFL"){
        var amount = document.getElementById("tfl"+utid).value;
    }else if(type == "tackles"){
        var amount = document.getElementById("tac"+utid).value;
    }else if(type == "sacks"){
        var amount = document.getElementById("sac"+utid).value;
    }else if(type == "interceptions"){
        var amount = document.getElementById("int"+utid).value;
    }else if(type == "pick6"){
        var amount = document.getElementById("pic"+utid).value;
    }

    console.log(amount);

    $.ajax({
        type: 'POST', 
            url: '/game/player/train/update',
            data: {"_token": "{{ csrf_token() }}", "type":type, "utid":utid, "amount":amount},
            success: function (data) {
                alert("Successfully updated player")
                window.location = '/statstic/game/'+game+'/update/train';
            },
            error:function(data){ 
                console.log(data);
                alert("Something went wrong.");
            }
            
    });

};

</script>

@endsection
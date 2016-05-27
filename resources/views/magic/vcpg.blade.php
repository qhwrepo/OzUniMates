<!-- Acknowledgement
	Creative reflection for VCPG6001 Unraveling Complexity, ANU. Xuan Luo U5548413.
	A story-based minigame by <a href="https://www.reddit.com/u/dSolver" target="_blank">dSolver</a>.
	The original piece is at http://www.codepen.io/dSolver/pen/GJvaNp under Open Source (MIT License).
-->

<html ng-app="app">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/foundation/5.5.0/css/foundation.css" type="text/css" rel="stylesheet">
	<link href="/css/vcpg.css" type="text/css" rel="stylesheet">
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js"></script>
	<script type="text/javascript" src="http://blockchain.info//Resources/wallet/pay-now-button.js"></script>
	<script type="text/javascript" src="/js/magic/vcpg.js"></script>
</head>

<body ng-controller="MainCtrl">
  <div ng-hide="started">
    <h2>IT Project Manager Simulator</h2>
		<h5>Facilitate a project that promotes the Unraveling Complexity learning journey to be adopted worldwide!</h5>
    <h7></h7>
    <hr>
    <div style="padding: 1em">
      <h6>Step One: Build your organisation:</h6>
      <div class="content">
        <form>
          <div class="row">
            <div class="large-12 columns">
              <label>
                <input type="text" ng-model="family.name" ng-blur="checkFamilyName()" placeholder="Name your organisation">
              </label>
            </div>
          </div>
          <div class="row">
            <div class="medium-6 columns">
              <label>
                <span>Starting funds: $<%family.steel%> </span>
                <input type="range" min=1000 max=10000 step=50 ng-model="family.steel">
              </label>
              <label>
                <span>Starting production: <%family.soldiers%> points</span>
                <input type="range" min=20 max=150 ng-model="family.soldiers">
              </label>
            </div>
            <div class="medium-6 columns">
              <div>Team Members: <%family.members.length%>/8</div>
              <div ng-repeat="member in family.members track by $index" class="deletable alert-box" ng-click="family.members.splice($index, 1)"><%member.name%> <a href="#" class="close">&times;</a></div>
              <div ng-show="family.members.length === 0">No team members. Why not add some?
              </div>
              <div ng-show="family.members.length<8">
                <div style="padding:0.5em">
                  <div class="row collapse">
                    <div class="small-9 columns">
                      <input type="text" ng-model="newMemberName" placeholder="New Team Member Name">
                    </div>
                    <div class="small-3 columns">
                      <button class="postfix" ng-click="addMember(newMemberName)">Add</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="row text-center">
        <div>
          <label>Pace: Slow
            <input type="range" min=0 max=19 ng-model="pace">Fast
          </label>
        </div>
        <hr>

        <a href="#" class="button [radius round]" ng-disabled="family.name.length == 0 || family.members.length == 0" ng-click="start()">Start the project!</a>
      </div>
    </div>
  </div>
  <div ng-show="started">
    <h3>Team <%family.name%> - Day <%family.day%></h3>
    <div class="row">
      <div class="small-6 columns">
        Funds: $<%family.steel%>
        <br>
        <button ng-click="collectTaxes()" ng-disabled="taxCD">Collect Profits</button>
      </div>
      <div class="small-6 columns">
        <div>Production: <%family.soldiers%> points</div>
        <div class="button-bar">
          <div>Generate Production (cost money):</div>
          <ul class="button-group round" style="font-size:75%">
            <li><a href="#" class="button" ng-click="hireSoldiers(10)" ng-disabled="family.steel < 100">10  ($100)</a></li>
            <li><a href="#" class="button" ng-click="hireSoldiers(100)" ng-disabled="family.steel < 1000">100  ($1,000)</a></li>
            <li><a class="button" ng-click="hireSoldiers(family.steel/10)">Max [<%family.steel/10 | number:0%>]</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div>Problems to solve:</div>
      <div class="place" ng-repeat="place in places">
        <%place.name%><span ng-if="place.house==family.name" class="solved"> - solved!</span>
      </div>
      <hr>
    </div>
    <div class="row">
      <div class="small-6 columns">
        <h5>Log</h5>
        <div style="max-height: 250px; overflow: auto;">
          <div ng-repeat="log in logs track by $index" class="log"><%log%></div>
        </div>
      </div>
      <div class="small-6 columns">
        <h5>Team Members:</h5>
        <div ng-repeat="member in family.members track by $index" class="family" ng-class="{dead:!member.alive}">
          <div>
            <%member.name%>
          </div>
          <div>Focused Problem: <%member.location%></div>
        </div>
        <div class="box">
          <h5>Chanllenges</h5>
          <div ng-repeat="person in family.enemies track by $index" class="deletable" ng-click="confirmAssassination(person)"><%person%></div>
        </div>
        <!-- <div class="box">
          <h5>Advantages</h5>
          <div ng-repeat="person in family.allies track by $index"><%person%></div>
        </div> -->
      </div>
    </div>
  </div>
  <div style="text-align:center; font-size:80%; color: #444;">
    <hr>
    <div>
			Creative reflection for VCPG6001 Unraveling Complexity. Xuan Luo U5548413
    </div>
  </div>
  <div ng-show="showAssassinOptions" class= "modal">
    So you wish to deal with the <%assassinationTarget%> problem quickly? There are several options:
    <hr>
    <div class="button-group">
      <button class="button tiny" ng-repeat="assassin in assassins" ng-click="orderKill(assassin, assassinationTarget)" ng-disabled="assassin.price > family.steel"><%assassin.name%> (<%assassin.price%> Gold)</button>
      <button class="button tiny" ng-click="cancelAssassination()">Cancel</button>
    </div>
  </div>
  <div ng-show="gameOver" class="modal">
    <h3><%gameOver%></h3>
  </div>
</body>

</html>

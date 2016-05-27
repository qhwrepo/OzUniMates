// mapping: places - problems, people - challenges, soldier - production (points)

var app = angular.module("app", [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
var dayCount = 1;

app.controller("MainCtrl", function($scope, $timeout, $interval) {

  $scope.pace = 8;
  $scope.paused = false;
  $scope.logs = [];
  $scope.log = function(msg) {
    msg = "Day " + $scope.family.day + " - " + msg;
    $scope.logs.unshift(msg);
    if ($scope.logs.length > 50) {
      $scope.logs.pop();
    }
  }
  $scope.taxCD = 0;
  $scope.collectTaxes = function() {
    if ($scope.taxCD === 0) {
      var taxes = Math.round(Math.random() * 300);

      $scope.family.steel += taxes;

      $scope.log("You collected $" + taxes + " as generated profit");
      $scope.taxCD = 15;
    }
  }

  $scope.stage = 0;
  $scope.hireSoldiers = function(amt) {
    amt = Math.floor(amt);
    if ($scope.family.steel >= amt * 10) {
      $scope.family.steel -= amt * 10;
      $scope.family.soldiers += amt;

      $scope.log("You generated " + amt + " production points");
    } else {
      $scope.log("Not enough funds to generate production points");
    }
  }
  $scope.checkFamilyName = function() {
    if ($scope.houses.indexOf($scope.family.name.toLowerCase().trim()) >= 0) {
      $scope.family.name += "-wannabe";
    }
  }
  $scope.places = [{
    name: 'Scope Definition',
    house: 'Stark'
  }, {
    name: 'Planning',
    house: 'Night\'s Watch'
  }, {
    name: 'Schedule Related',
    house: 'Bolton'
  }, {
    name: 'Teamwork',
    house: 'Baratheon'
  }, {
    name: 'Communication Effectiveness',
    house: 'Lannister'
  }, {
    name: 'Stakeholder Relationship',
    house: 'Braavos'
  }, {
    name: 'Risk Management',
    house: 'Greyjoy'
  }, {
    name: 'Multiculture Context',
    house: 'Arryn'
  }, {
    name: 'Multidiscipline Context',
    house: 'Lannister'
  }];

  $scope.family = {
    name: "",
    steel: 1000,
    soldiers: 20,
    members: [],
    day: 0,
    enemies: [],
    allies: []
  }

  $scope.addMember = function(name) {
    $scope.newMemberName = "";
    $scope.family.members.push({
      name: name,
      alive: true,
      location: "General Stuff"
    });

  }
  $scope.houses = [
    "stark",
    "lannister",
    "baratheon",
    "greyjoy",
    "bolton",
    "martell",
    "targaryen",
    "tully",
    "arryn",
    "tyrell",
    "clegane",
    "frey"
  ]

  $scope.lords = [
    "Little Finger",
    "Varys",
    "Ned Stark",
    "Robb Stark",
    "Cersei Lannister",
    "Robert Baratheon",
    "Theon Greyjoy",
    "Roose Bolton",
    "Joffrey Baratheon",
    "Stannis Baratheon",
    "Tywin Lannister",
    "Tyrion Lannister",
    "Doran Martell",
    "Margery Tyrell",
    "Ollena Tyrell",
    "Selyse Baratheon",
    "Balon Greyjoy"
  ]

  $scope.people = [
    "Poor Communication",
    "Team Conflicts",
    "Culture Barriers",
    "Undefined Goals",
    "Inadequate Skills for the Project",
    "Lack of Accountability",
    "Lack of Stakeholder Engagement",
    "Barriers between Science and Humanity",
    "Slow Adoption to Changes",
    "Ignorance of Interdisciplinarity"
  ]

  $scope.run = function() {
    $timeout(function() {
      var event = $scope.events[Math.floor(Math.random() * $scope.events.length)];
      console.log(event);
      event();
      $scope.updateState();
      if (!$scope.paused) {
        dayCount++;
        dayCount = dayCount % 5;
        if(dayCount==1) $scope.family.day++;
        $scope.run();
      }
    }, 2000 - $scope.pace * 100);
  }
  $scope.pause = function() {
    $scope.paused = true;
  }
  $scope.continue = function() {
    if ($scope.paused) {
      $scope.paused = false;

      $scope.run();
    }
  }

  $scope.start = function() {
    window.alert("Your project team are trying hard to solve various problems.\n As the project manegement team you need to facilitate them by:\n 1. Collect funds\n 2. Generate(buy) production points\n 3. Handle chanlleges(click on them!) ");
    $scope.pace = parseInt($scope.pace);
    if ($scope.family.name.length > 0 && $scope.family.members.length > 0) {
      $scope.started = true;
      angular.forEach($scope.family.members, function(member) {
        if (member.name.indexOf($scope.family.name) < 0) {
          member.name += " " + $scope.family.name;
        }
      });

      $scope.family.soldiers = parseInt($scope.family.soldiers);
      $scope.family.steel = parseInt($scope.family.steel);
      $scope.run();
    }

  }

  $scope.end = function(message) {

    $timeout(function() {
      $scope.gameOver = message;
    }, 1000);

  }

  $scope.randomFamily = function(onlyAlive) {
    var pool = [];
    angular.forEach($scope.family.members, function(member) {
      if (onlyAlive && member.alive || !onlyAlive) {
        pool.push(member);
      }
    });
    if (pool.length > 0) {
      return pool[Math.floor(Math.random() * pool.length)]
    } else {
      return null
    }
  }

  $scope.updateState = function() {
    var someFamilyIsAlive = false;
    var somebodyIsAlive = $scope.people.length > 0;
    if ($scope.taxCD > 0) {
      $scope.taxCD--;
    }
    if ($scope.assassinationCD > 0) {
      $scope.assassinationCD--;
    }
    if ($scope.territoryTax > 0) {
      $scope.territoryTax--;
    }
    angular.forEach($scope.family.members, function(member) {
      if (member.alive) {
        someFamilyIsAlive = true;
      }
    });

    if (!somebodyIsAlive) {
      $scope.pause();
      $scope.end("You have solved all problems involved in your project. Congratulations!")
    }

    if (!someFamilyIsAlive) {
      $scope.pause();
      $scope.end("Your team is unable to solve different kinds of problems :( The project lasted " + $scope.family.day + " days.");
    }
  }
  $scope.assassins = [{
    name: "Check Docs",
    price: 20,
    successRate: 0.01
  }, {
    name: "Relocate to Internet",
    price: 500,
    successRate: 0.12
  }, {
    name: "Reimplement the Issue",
    price: 1500,
    successRate: 0.35
  }, {
    name: "Hire an Expert Team",
    price: 2500,
    successRate: 0.5
  }, {
    name: "Hire Chris Brown",
    price: 30000,
    successRate: 0.99
  }]
  $scope.showAssassinOptions = false;
  $scope.assassinationTarget = "";
  $scope.assassinationCD = 0;
  $scope.cancelAssassination = function() {
    $scope.showAssassinOptions = false;
    $scope.continue();
  }
  $scope.confirmAssassination = function(person) {
    if ($scope.assassinationCD === 0 && $scope.stage >= 0) {
      if ($scope.stage < 1 && person === "Culture Barriers") {
        $scope.log("There's no shortcut to solve this problem.. It takes time for the team to grow and learn from past experience.")
      } else {
        $scope.assassinationTarget = person;
        $scope.pause();
        $scope.showAssassinOptions = true;
      }

    }
  }

  $scope.orderKill = function(assassin, person) {
    if ($scope.family.steel >= assassin.price) {
      $scope.family.steel -= assassin.price;
      $scope.showAssassinOptions = false;
      var roll = Math.random();
      if (roll < assassin.successRate) {
        $scope.killPerson(person);
        $scope.log("You opted " + assassin.name + " to solve the problem " + person + ", and the attempt was successful");
      } else {
        $scope.log("Unfortunately, " + assassin.name + " has failed the attempt on " + person + ". Luckily it has no other bad impact on the project.");
      }
      $scope.continue();
      $scope.assassinationCD = 25;
    }

  }

  $scope.killPerson = function(person) {
    if ($scope.family.allies.indexOf(person) >= 0) {
      $scope.family.allies.splice($scope.family.allies.indexOf(person), 1);
    }
    if ($scope.family.enemies.indexOf(person) >= 0) {
      $scope.family.enemies.splice($scope.family.enemies.indexOf(person), 1);
    }

    $scope.people.splice($scope.people.indexOf(person), 1);
  }

  $scope.events = [];
  $scope.territoryTax = 0;
  var taxCollection = function() {
    var tax = 0;
    if ($scope.territoryTax == 0) {
      angular.forEach($scope.places, function(place) {
        if (place.house === $scope.family.name) {
          tax += 1200;
        }
      });

      if (tax > 0) {
        $scope.territoryTax = 30;
        $scope.family.steel += tax;
        $scope.log("Your Project attracted $" + tax + " from investors and organisations.");
      }
    }
  }
  $scope.events.push(taxCollection);

  var invasion = function() {
    if (Math.random() < 0.05) {
      if ($scope.family.soldiers > 0) {
        var enemies = Math.floor(Math.random() * $scope.family.soldiers + 10);
        $scope.family.soldiers -= Math.floor(enemies * Math.random() * 0.5);

        var invader = $scope.people[Math.floor(Math.random() * $scope.people.length)];

        if ($scope.family.enemies.indexOf(invader) >= 0) {
          $scope.log(invader + " damaged your team's production points! Your production points are now " + $scope.family.soldiers);

        } else {
          $scope.log(invader + " happened in your project team. It might become an obstacle for development.");
          $scope.family.enemies.push(invader);
        }
      }
    }
  }
  $scope.events.push(invasion);

  var assassin = function() {
    if (Math.random() < 0.01) {
      var victim = $scope.randomFamily(true);
      if (victim) {
        victim.alive = false;
        var perpetrator = $scope.people[Math.floor(Math.random() * $scope.people.length)];
        $scope.log(victim.name + " left your team. Recently " + victim.location + " has turned into a headache for him/her. Could this be the reason for the resignation?");
        if ($scope.family.allies.indexOf(perpetrator) >= 0) {
          $scope.family.allies.splice($scope.family.allies.indexOf(perpetrator), 1);
        }

        if ($scope.family.enemies.indexOf(perpetrator) < 0) {
          $scope.family.enemies.push(perpetrator);
        }

      }
    }

  }
  $scope.events.push(assassin);

  var allianceWith = function() {
    if (Math.random() < 0.13) {
      var person = $scope.people[Math.floor(Math.random() * $scope.people.length)];

      if ($scope.family.allies.indexOf(person) < 0) {
        if ($scope.family.enemies.indexOf(person) >= 0) {
          if (Math.random() < 0.3) {
            $scope.log("Your team solved the problem " + person + " by tight collaboration. Well done.");
            $scope.family.enemies.splice($scope.family.enemies.indexOf(person), 1);
          } else {
            $scope.log("Your team members are working towards solving the problem " + person + ", however some Engineers in your team felt unnecessary to care about this kind of 'soft skills'. The problem remains unsolved.");
          }
        } else {
        }
      }
    }
  }
  $scope.events.push(allianceWith);

  var invadePlace = function() {
    if (Math.random() < 0.2 && $scope.stage > 0) {
      var randPlace = $scope.places[Math.floor(Math.random() * $scope.places.length)];
      if (randPlace.house != $scope.family.name && randPlace.name != "Risk Management") {
        if (Math.random() < 0.2 && $scope.family.soldiers > 400) {
          var newMen = Math.round(Math.random() * 100) + 5;
          var newSteel = Math.round(Math.random() * 3000) + 100;

          var leader = $scope.randomFamily(true);

          $scope.log(leader.name + " successfully solved the problem " + randPlace.name + " by the cost of " + $scope.family.soldiers + " production points! This encouraging news also brought $" + newSteel + " and " + newMen + " production points to your team.");

          leader.location = randPlace.name;
          randPlace.house = $scope.family.name;
          $scope.family.steel += newSteel;
          $scope.family.soldiers += newMen;
        } else if ($scope.family.soldiers > 400) {
          var soldiersDied = Math.floor(Math.random() * $scope.family.soldiers * 0.8);

          var leader = $scope.randomFamily(true);

          $scope.log(leader.name + " worked towards the problem " + randPlace.name + " but failed to solve it. In the process, " + soldiersDied + " production points were consumed.");

          $scope.family.soldiers -= soldiersDied;
        }
      }
    }
  }
  $scope.events.push(invadePlace);

  var summons = function() {
    if (Math.random() < 0.2 && $scope.stage === 0 && $scope.family.steel > 400) {
      var summoned = $scope.randomFamily(true);
      summoned.location = "Government Relationship";
      $scope.log(summoned.name + " has successfully attracted government's interest to the project. Your team received $20,000 and 1500 production points for the progress.");

      var soldiers = 1500;
      var steel = 20000;

      $scope.family.steel += steel;
      $scope.family.soldiers += soldiers;

      $scope.stage = 1;
    }
  }
  $scope.events.push(summons);

  var kingDies = function() {
    if (Math.random() < 0.2 && $scope.stage == 1) {
      angular.forEach($scope.family.members, function(member) {
        member.location = "General Stuff";
      });
      $scope.log("The government annouced to terminal their collaboration with your team. The person in charge returned and can work on other problem now.");
      $scope.stage = 2;
    } else if ($scope.stage == 1) {
      angular.forEach($scope.family.members, function(member) {
        if (member.location === "Government Relationship" && member.alive) {
          member.alive = false;
          $scope.log(member.name + " failed on collborating with the government.");
          if ($scope.family.enemies.indexOf("Bad Government Relationship") < 0) {
            $scope.family.enemies.push("Bad Government Relationship");
          }
        }
        $scope.stage = 2;
      });
      $scope.stage = 2;
    }
  }

  $scope.events.push(kingDies);

  var winterIsComing = function() {
    if (Math.random < 0.1 && $scope.stage <= 1) {
      $scope.stage = 2;
      $scope.log("The project is progressing well so far. Now it's the second half and more stakeholders from different culture backgrounds are involved.");
      $scope.nightsWatchRecruiting = true;
    }
  }
  $scope.events.push(winterIsComing);

  var visitsNightsWatch = function() {
    if (Math.random() < 0.02 && $scope.stage == 2 && $scope.nightsWatchRecruiting) {
      var person = $scope.randomFamily(true);
      person.location = "Multiculture Context";
      $scope.log(person.name + " started to look into multiculture in the project as more and more stakeholders are involved. Hope this can enhance the project progress.");
      $scope.nightsWatchRecruiting = false;
    }
  }
  $scope.events.push(visitsNightsWatch);

  $scope.ollied = false;
  var olly = function() {
    if (!$scope.ollied && Math.random() < 0.13) {
      var person = null;
      angular.forEach($scope.family.members, function(member) {
        if (member.alive && member.location == "Risk Management") {
          person = member;
        }
      });
      if (person) {
        $scope.log("Due to inadequate risk management " + person.name + " failed his task deadly.");
        person.alive = false;
        $scope.ollied = true;
      }
    }
  }
  $scope.events.push(olly);

  $scope.trialled = false;
  var trialByCombat = function() {
    if ($scope.stage >= 2 && !$scope.trialled) {
      $scope.trialled = true;
      var person = $scope.randomFamily(true);
      person.location = "Communication Effectiveness";
      var msg = person.name + " was involved in a team conflict due to ineffective communication between people with different disciplines. ";

      msg += person.name + " decided to communicate again with the facilitation of project management team. ";
      if (Math.random() < 0.5) {
        msg += "This time the communication went well and both are satisfied. " + person.name + "returned to his work.";
        person.location = "General Stuff";
      } else {
        msg += "The contradiction was intensified and led to a huge failure by " + person.name + ".";
        person.alive = false;
      }
      $scope.log(msg);
    }
  }
  $scope.events.push(trialByCombat);
});

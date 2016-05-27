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
      location: "General"
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
    name: "Check the Documentation",
    price: 20,
    successRate: 0.01
  }, {
    name: "Relocate Project to the Internet",
    price: 500,
    successRate: 0.12
  }, {
    name: "Learn from Peer Teams",
    price: 1000,
    successRate: 0.25
  }, {
    name: "Reimplement the Issue",
    price: 2000,
    successRate: 0.4
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

  $scope.events = []
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
        $scope.log("In the depth of night at " + victim.location + ", an assassin murdered " + victim.name + " in cold blood, and silently left, leaving behind only a note: 'Regards, " + perpetrator + "'. Could this be the one who hired the assassin?");
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
            $scope.log(person + " came to you to beg forgiveness. In a move that will go down in history as 'Extremely stupid', you do. Oh well, lets see what happens next");
            $scope.family.enemies.splice($scope.family.enemies.indexOf(person), 1);
          } else {
            $scope.log(person + " came to you to beg forgiveness. You cleverly rejected the proposal. Well done.");
          }
        } else {
          if (Math.random() < 0.3) {
            $scope.log(person + " proposed to form an alliance with you. You decided against the proposal, they seem difficult to trust");
          } else {

            if (person === "Hodor") {
              $scope.log("Hodor wants to help you - 'Hodor'");
            } else {

              var msg = person + " proposed to form an alliance with you, and you gladly accepted it. ";
              if ($scope.lords.indexOf(person) >= 0) {
                var steel = Math.round(Math.random() * 10000 + 400);
                var soldier = Math.round(Math.random() * 400 + 20);
                $scope.family.steel += steel;
                $scope.family.soldiers += soldier;
                msg += "In celebration, " + person + " gifted you with " + steel + " Gold Dragons and " + soldier + " Soldiers";
              }
              $scope.log(msg);
            }

            $scope.family.allies.push(person);

          }
        }
      }
    }
  }
  $scope.events.push(allianceWith);

  var invadePlace = function() {
    if (Math.random() < 0.2 && $scope.stage > 0) {
      var randPlace = $scope.places[Math.floor(Math.random() * $scope.places.length)];
      if (randPlace.house != $scope.family.name && randPlace.name != "Castle Black") {
        if (Math.random() < 0.2 && $scope.family.soldiers > 400) {
          var newMen = Math.round(Math.random() * 100) + 5;
          var newSteel = Math.round(Math.random() * 3000) + 100;

          var leader = $scope.randomFamily(true);

          $scope.log(leader.name + " marched against " + randPlace.name + " and took it with " + $scope.family.soldiers + " men. Turns out, the people of " + randPlace.name + " welcomed your house, and provided you with " + newMen + " new soldiers and " + newSteel + " Gold Dragons");

          leader.location = randPlace.name;
          randPlace.house = $scope.family.name;
          $scope.family.steel += newSteel;
          $scope.family.soldiers += newMen;
        } else if ($scope.family.soldiers > 400) {
          var soldiersDied = Math.floor(Math.random() * $scope.family.soldiers * 0.8);

          var leader = $scope.randomFamily(true);

          $scope.log(leader.name + " marched against " + randPlace.name + " but failed to take it. In the process, " + soldiersDied + " soldiers died. It was a devastating loss");

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
      $scope.log(summoned.name + " has successfully attracted government's interest to the project. Your team received $20,000 and 1500 production points for the progress.")

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
        member.location = "Home";
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
      $scope.log("The Night's Watch sent a raven: Winter is Coming");
      $scope.nightsWatchRecruiting = true;
    }
  }
  $scope.events.push(winterIsComing);

  var visitsNightsWatch = function() {
    if (Math.random() < 0.02 && $scope.stage == 2 && $scope.nightsWatchRecruiting) {
      var person = $scope.randomFamily(true);
      person.location = "Castle Black";
      $scope.log(person.name + " journeyed to Castle Black to learn about the Night's Watch. They speak of White Walkers, but they're extinct... right?");
      $scope.nightsWatchRecruiting = false;
    }
  }
  $scope.events.push(visitsNightsWatch);

  var allyKilled = function() {
    if ($scope.family.allies.length > 0 && Math.random() < 0.2 && $scope.stage > 1) {
      var victim = $scope.family.allies[Math.floor(Math.random() * $scope.family.allies.length)];

      var roll = Math.random();
      if (roll < 0.2) {
        $scope.log("Your ally, " + victim + " died in the night, \"peacefully\"");
      } else if (roll < 0.6) {
        $scope.log("Your ally, " + victim + " died of poison. The one responsible has not been caught");
      } else if (roll < 0.9) {
        $scope.log(victim + " died en route to Winterfell. Wonder who was behind it?");
      } else {
        $scope.log(victim + " died horrifically being burnt alive. Let this be a lesson about playing with fire.");
      }

      $scope.killPerson(victim);
    }
  }
  $scope.events.push(allyKilled);

  $scope.ollied = false;
  var olly = function() {
    if (!$scope.ollied && Math.random() < 0.13) {
      var person = null;
      angular.forEach($scope.family.members, function(member) {
        if (member.alive && member.location == "Castle Black") {
          person = member;
        }
      });
      if (person) {
        $scope.log("Some Men of the Watch branded " + person.name + " a traitor. There was a log of stabbing, and blood, and Olly, whose parents died.");
        person.alive = false;
        $scope.ollied = true;
      }
    }
  }
  $scope.events.push(olly);

  $scope.melisandered = false;
  var melisander = function() {
    if (!$scope.melisandered && Math.random() < 0.02 && $scope.family.allies.indexOf("Melisandre") >= 0) {
      var alive = 0;
      var victim;
      angular.forEach($scope.family.members, function(member) {
        if (member.alive) {
          alive++;
          victim = member;
        }
      });
      if (alive > 1) {
        $scope.log("Melisandre convinced your House to burn " + victim.name + " in the name of the Lord of Light to melt some snow. After having done the deed, she quickly left at the realization of her mistake.");
        victim.alive = false;

      } else {
        $scope.log("Melisandre is displeased with the lack of progress for the Iron Throne, and decided to leave you. Might as well, she was suggesting something about burning royalty");

      }
      $scope.family.allies.splice($scope.family.allies.indexOf("Melisandre"), 1);
      $scope.melisandered = true;
    }
  }
  $scope.events.push(melisander);

  $scope.demonBabied = false;
  var demonBaby = function() {
    if ($scope.family.allies.indexOf("Melisandre") >= 0 && !$scope.melisandered && $scope.family.enemies.length > 0 && !$scope.demonBabied) {
      $scope.demonBabied = true;
      var person = $scope.randomFamily(true);
      var victim = $scope.family.enemies[Math.floor(Math.random() * $scope.family.enemies.length)];
      $scope.log(person.name + " was seduced by Melisandre, they made love, then she gave birth to a demon baby, because. Then this demon baby killed " + victim + ", so there's that. Hope " + person.name + " didn't get an STD in the process.");

      $scope.killPerson(victim);
    }
  }
  $scope.events.push(demonBaby);

  $scope.trialled = false;
  var trialByCombat = function() {
    if ($scope.stage >= 2 && !$scope.trialled) {
      $scope.trialled = true;
      var person = $scope.randomFamily(true);
      person.location = "King's Landing";
      var msg = person.name + " was forcibly taken to King's Landing under the charge of Treason. ";
      if ($scope.family.allies.indexOf("Doran Martell") >= 0) {
        msg += "Oberyn Martell decided to be your Champion as his brother Doran is allied with you. He's a pretty nice guy, but maybe his emotions got in the way. Anyway, he died pretty gruesomely in the duel. ";
        if (Math.random() < 0.75 && $scope.family.allies.length > 0) {
          var ally = $scope.family.allies[Math.floor(Math.random() * $scope.family.allies.length)];
          msg += person.name + " however managed to escape with the help of " + ally;
          person.location = "Home";
        } else {
          person.alive = false;
          msg += person.name + " was summarily executed on the spot by the Crown's champion";
        }
      } else {
        msg += person.name + " decided to be cleared of charges via trial by combat. ";
        if (Math.random() < 0.5) {
          msg += person.name + " won, and was let go";
          person.location = "Home";
        } else {
          msg += person.name + " died by sword through gut.";
          person.alive = false;
        }
      }
      $scope.log(msg);
    }
  }
  $scope.events.push(trialByCombat);

  var territoryChange = function() {
    if ($scope.stage > 1 && Math.random() < 0.3 && $scope.people.length > 1) {
      var person = $scope.people[Math.floor(Math.random() * $scope.people.length)];

      var place = $scope.places[Math.floor(Math.random() * $scope.places.length)];

      var personHouse = "";
      angular.forEach($scope.houses, function(house) {
        if (person.toLowerCase().indexOf($scope.houses) >= 0) {
          personHouse = house;
          personHouse = personHouse.substring(0, 1).toUpperCase() + personHouse.substring(1);
        }
      });

      if (personHouse && personHouse !== place.house) {
        place.house = personHouse;
        $scope.log(person + " attacked " + place.name + " and took control of it.");
      }
    }

  }
});

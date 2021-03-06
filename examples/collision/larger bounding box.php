<?php
    $title = "Larger bounding box";
    require('../head.php');
?>

<script type="text/javascript">

(function () {

    var game = new Phaser.Game(800, 600, Phaser.CANVAS, '', { preload: preload, create: create, update: update, render: render });

    function preload() {

        game.load.image('atari', 'assets/sprites/atari130xe.png');
        game.load.image('mushroom', 'assets/sprites/mushroom2.png');

    }

    var sprite1;
    var sprite2;

    function create() {

        game.stage.backgroundColor = '#2d2d2d';

        sprite1 = game.add.sprite(50, 200, 'atari');
        sprite1.name = 'atari';
        sprite1.body.velocity.x = 100;

        //  In this example the new collision box is much larger than the original sprite
        sprite1.body.setSize(400, 50, -100, 20);

        sprite2 = game.add.sprite(700, 220, 'mushroom');
        sprite2.name = 'mushroom';
        sprite2.body.velocity.x = -100;

    }

    function update() {

        // object1, object2, collideCallback, processCallback, callbackContext
        game.physics.collide(sprite1, sprite2, collisionHandler, null, this);

    }

    function collisionHandler (obj1, obj2) {

        game.stage.backgroundColor = '#992d2d';

        console.log(obj1.name + ' collided with ' + obj2.name);

    }

    function render() {

        game.debug.renderRectangle(sprite1.body);
        game.debug.renderRectangle(sprite2.body);

    }

})();
</script>

<?php
    require('../foot.php');
?>
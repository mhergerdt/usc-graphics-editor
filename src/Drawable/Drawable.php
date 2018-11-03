<?php

namespace App\Drawable;

use App\Graphics\Graphics;

interface Drawable
{
    public function draw(Graphics $graphics);
}

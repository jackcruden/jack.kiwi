<?php

namespace App\Models;

enum PostType: string {
    case Blog = 'Blog';
    case Project = 'Project';
    case Sketch = 'Sketch';
}

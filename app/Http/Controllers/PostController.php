<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        return response()->json([
            [
                'id' => 1,
                'title' => 'Exploring the Beauty of Nature',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum vestibulum.',
                'author' => 'John Doe',
                'created_at' => '2024-01-01 10:00:00',
                'updated_at' => '2024-01-01 10:00:00',
            ],
            [
                'id' => 2,
                'title' => 'The Future of Technology',
                'content' => 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.',
                'author' => 'Jane Smith',
                'created_at' => '2024-02-15 14:30:00',
                'updated_at' => '2024-02-15 14:30:00',
            ],
            [
                'id' => 3,
                'title' => 'Healthy Eating Habits',
                'content' => 'Pellentesque in ipsum id orci porta dapibus. Nulla quis lorem ut libero malesuada feugiat.',
                'author' => 'Alice Johnson',
                'created_at' => '2024-03-10 09:15:00',
                'updated_at' => '2024-03-10 09:15:00',
            ],
            [
                'id' => 4,
                'title' => 'Top Travel Destinations for 2024',
                'content' => 'Curabitur aliquet quam id dui posuere blandit. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.',
                'author' => 'Bob Brown',
                'created_at' => '2024-04-05 18:45:00',
                'updated_at' => '2024-04-05 18:45:00',
            ],
            [
                'id' => 5,
                'title' => 'The Impact of Climate Change',
                'content' => 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec rutrum congue leo eget malesuada.',
                'author' => 'Emily White',
                'created_at' => '2024-05-20 11:20:00',
                'updated_at' => '2024-05-20 11:20:00',
            ],
        ]);
    }
}

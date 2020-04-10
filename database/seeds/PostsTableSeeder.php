<?php

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $author2 = User::create([
            'name' => 'Aayush Malakar',
            'email' => 'aayush@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $category1 = Category::create([
            'name' => 'News'
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = Category::create([
            'name' => 'Design'
        ]);

        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, tempore.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, tempore.',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg',
            'user_id' => $author1->id
        ]);

        $post2 = $author2->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, tempore.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, tempore.',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg'
        ]);

        $post3 = $author1->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, tempore.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, tempore.',
            'category_id' => $category3->id,
            'image' => 'posts/8.jpg'
        ]);

        $post4 = $author2->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, tempore.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, tempore.',
            'category_id' => $category2->id,
            'image' => 'posts/4.jpg'
        ]);

        $tag1 = Tag::create([
            'name' => 'Job'
        ]);

        $tag2 = Tag::create([
            'name' => 'Customers'
        ]);

        $tag3 = Tag::create([
            'name' => 'Record'
        ]);

        $tag4 = Tag::create([
            'name' => 'Offer'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag3->id, $tag4->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);
        $post4->tags()->attach([$tag2->id, $tag4->id]);
    }
}

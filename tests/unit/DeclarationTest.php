<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\DeclarationController;
use App\User;
use App\Declaration;
use Illuminate\Http\Request;

class DeclarationTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testbelongsToUser()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user);

        $declaration = new Declaration();
        $declaration->date_receipt = '09-09-2018';
        $declaration->total_receipt = 100;
        $declaration->type = 'travel';
        $declaration->btw = 20;
        $declaration->description = 'lala';


        $dec = json_encode($declaration);

        $request = new Request();
        $request->json = $dec;
        $request->method = "POST";

        $controller = new DeclarationController();
        $controller->store($dec);

        $this->assert($new->user_id == $user->id);
    }
}

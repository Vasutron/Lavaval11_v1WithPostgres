<?php

use App\Livewire\HomePage;
use App\Livewire\UsersList;
use App\Livewire\UsersPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);

Route::get('/users/{user}', UsersPage::class);

Route::get('/users-list', UsersList::class);

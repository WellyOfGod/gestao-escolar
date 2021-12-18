<?php

use Illuminate\Support\Collection;

function menuList(): Collection
{

    return collect([
        [
            'menu-header' => 'Educacional',
            'dropdown' => [
                'nav-link' => 'Cadastro',
                'dropdown-menu' => [
                    [
                        'title' => 'Cadastro de Aluno',
                        'routeName' => 'student.create',
                        'menuLink' => 'Aluno'
                    ],
                    [
                        'title' => 'Cadastro de Curso',
                        'routeName' => 'course.create',
                        'menuLink' => 'Curso'
                    ],
                    [
                        'title' => 'Cadastro de Disciplina',
                        'routeName' => 'discipline.create',
                        'menuLink' => 'Disciplina'
                    ],
                ]
            ],
        ]

    ]);
}

<?php

use Illuminate\Database\Seeder;

class StatusUserStorySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $status = [
            [
                'name' => 'Pending',
                'description' => 'The project has not started',
                'classcolor' => 'bg-yellow'
            ],
            [
                'name' => 'In progress',
                'description' => 'The project is in progress',
                'classcolor' => 'bg-aqua-active'
            ],
            [
                'name' => 'Finished',
                'description' => 'The project is finished',
                'classcolor' => 'bg-green'
            ],
        ];
        DB::delete('delete from status_userstories');
        foreach ($status as $key => $value) {

            $statusProject = new App\Models\StatusUserStory();
            $statusProject->name = $value['name'];
            $statusProject->description = $value['description'];
            $statusProject->classcolor = $value['classcolor'];
            $statusProject->save();
        }
    }

}

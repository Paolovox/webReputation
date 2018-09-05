<?php

use Illuminate\Database\Seeder;
use App\Ticket;
class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $ticket1 = new Ticket();
        $ticket1->oggetto = "Oggetto ticket 1";
        $ticket1->messaggio = "asdasdasdsdadasdwqwwqeeqwqweqweqwdasdasadshadsjhasdjkasdhajdkshdsajkhdasjkdashjksadhjkdsahjkadshjkasdhdasjdsahkjsadha<br>asdasdasads";
        $ticket1->status = 'open';
        $ticket1->dossier_id = 1;
        $ticket1->save();


        $ticket2 = new Ticket();
        $ticket2->oggetto = "Oggetto ticket 2";
        $ticket2->messaggio = "asdasdasdsdadasdwqwwqeeqwqweqweqwdasdasadshadsjhasdjkasdhajdkshdsajkhdasjkdashjksadhjkdsahjkadshjkasdhdasjdsahkjsadha<br>asdasdasads";
        $ticket2->status = 'open';
        $ticket2->dossier_id = 1;
        $ticket2->save();

        $ticket3 = new Ticket();
        $ticket3->oggetto = "Oggetto ticket 3";
        $ticket3->messaggio = "asdasdasdsdadasdwqwwqeeqwqweqweqwdasdasadshadsjhasdjkasdhajdkshdsajkhdasjkdashjksadhjkdsahjkadshjkasdhdasjdsahkjsadha<br>asdasdasads";
        $ticket3->status = 'open';
        $ticket3->dossier_id = 1;
        $ticket3->save();

        $ticket4 = new Ticket();
        $ticket4->parent_id = 2;
        $ticket4->oggetto = "Oggetto ticket 2";
        $ticket4->messaggio = "asdasdasdsdadasdwqwwqeeqwqweqweqwdasdasadshadsjhasdjkasdhajdkshdsajkhdasjkdashjksadhjkdsahjkadshjkasdhdasjdsahkjsadha<br>asdasdasads";
        $ticket4->status = 'open';
        $ticket4->dossier_id = 1;
        $ticket4->save();

        $ticket5 = new Ticket();
        $ticket5->parent_id = 1;
        $ticket5->oggetto = "Oggetto ticket 1";
        $ticket5->messaggio = "asdasdasdsdadasdwqwwqeeqwqweqweqwdasdasadshadsjhasdjkasdhajdkshdsajkhdasjkdashjksadhjkdsahjkadshjkasdhdasjdsahkjsadha<br>asdasdasads";
        $ticket5->status = 'open';
        $ticket5->dossier_id = 1;
        $ticket5->save();
    }
}

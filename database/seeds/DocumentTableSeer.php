<?php

use Illuminate\Database\Seeder;
use App\Document;
class DocumentTableSeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $document1 = new Document();
        $document1->dossier_id = 1;
        $document1->title = "Document1";
        $document1->filename = "sample-1.pdf";
        $document1->original_filename = "sample-1.pdf";
        $document1->save();

        $document2 = new Document();
        $document2->dossier_id = 1;
        $document2->title = "Document2";
        $document2->filename = "sample-2.pdf";
        $document2->original_filename = "sample-2.pdf";
        $document2->save();

        $document3 = new Document();
        $document3->dossier_id = 1;
        $document3->title = "Document3";
        $document3->filename = "sample-3.pdf";
        $document3->original_filename = "sample-3.pdf";
        $document3->save();

        $document4 = new Document();
        $document4->dossier_id = 1;
        $document4->title = "Document4";
        $document4->filename = "sample-4.pdf";
        $document4->original_filename = "sample-4.pdf";
        $document4->save();
    }
}

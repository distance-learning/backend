<?php

namespace App\Services;

use App\Models\File;
use App\Models\Question;
use App\Models\Test;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Writers\LaravelExcelWriter;

/**
 * Class TestAnswersExport
 * @package App\Service
 */
class TestAnswersExportService
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var string
     */
    private $excelPath = 'uploads/xls';

    /**
     * TestAnswersExport constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param Test $test
     * @return File
     */
    public function generate(Test $test)
    {
        /** @var LaravelExcelWriter $excel */
        $excel = $this->createExportFile($test);

        return $this->saveExportFile($test, $excel);
    }

    /**
     * @param Test $test
     * @return mixed
     */
    private function createExportFile(Test $test)
    {
        $timestamp = Carbon::now()->getTimestamp();

        return \Excel::create("test_answers_{$timestamp}", function ($excel) use ($test) {
            $excel->sheet(substr($test->name, 0, 31), function ($sheet) use ($test) {
                $sheet->row(1, [
                    'Запитання',
                    'Кількість часу на запитання (в секундах)',
                    'Кількість відповідей',
                    'Кількість балів за запитання',
                    'Відповіді:'
                ]);

                /**
                 * @var int $key
                 * @var Question $question
                 */
                foreach ($test->questions as $key => $question) {
                    switch ($question->type) {
                        case Question::SINGLE_TYPE:
                            $row = $this->processSingleTypeQuestion($question);
                            break;

                        case Question::MULTISELECT_TYPE:
                            $row = $this->processMultiselectTypeQuestion($question);
                            break;

                        case Question::TO_MATCH:
                            break;

                        case Question::YES_OR_NO_TYPE:
                            break;

                        case Question::WRITE_RESULT_TYPE:
                            break;
                    }

                    $sheet->row($key + 2, $row);
                }
            });
        })->store('xls', $this->getExcelPath());
    }

    /**
     * @param Question $question
     * @return array
     */
    private function processSingleTypeQuestion(Question $question)
    {
        $row = [
            strip_tags(trim($question->name)),
            $question->time,
            ($question->type == Question::SINGLE_TYPE) ? 'Одна' : 'Багато',
            $question->score,
        ];

        foreach ($question->answers as $answer) {
            $row[] = strip_tags(trim($answer->body));
        }

        return $row;
    }

    /**
     * @param Question $question
     * @return array
     */
    private function processMultiselectTypeQuestion(Question $question)
    {
        $row = [
            strip_tags(trim($question->name)),
            $question->time,
            ($question->type == Question::SINGLE_TYPE) ? 'Одна' : 'Багато',
            $question->score,
        ];

        foreach ($question->answers as $answer) {
            $row[] = strip_tags(trim($answer->body));
        }

        return $row;
    }

    /**
     * @param Test $test
     * @param LaravelExcelWriter $xls
     * @return File
     */
    protected function saveExportFile(Test $test, LaravelExcelWriter $xls)
    {
        $file = new File();
        $file->filename = "Запитання до тесту {$test->name}";
        $file->path = "/uploads/xls/{$xls->filename}.{$xls->ext}";
        $file->author_id = $this->user->id;
        $file->content_type = "xls";
        $file->save();

        return $file;
    }

    /**
     * @return string
     */
    private function getExcelPath()
    {
        return public_path($this->excelPath);
    }
}

<?php
namespace thipages\quick\tests;
use thipages\quick\QTable;
use thipages\quick\QTag;
class QTests {
    public static function textarea($value) {
        return QTag::tag(
            'textarea', $value,
            ['style' => 'border-style:none;width:300px;overflow:hidden', 'readonly' => true]
        );
    }
    public static function getOutput($qTestsOrList, $htmlOutput=false, $idFilter=null) {
        if (!is_array($qTestsOrList)) $qTestsOrList=[$qTestsOrList];
        $headers=['Description', 'Result', 'Actual', 'Expected'];
        if ($htmlOutput) $headers[]="Html";
        $html = [];
        if ($idFilter!==null) $qTestsOrList=[$qTestsOrList[$idFilter[0]]];
        foreach ($qTestsOrList as $test) {
            $res = [];
            $index=0;
            foreach ($test::tests() as $dataset) {
                if ($idFilter===null || ($idFilter!==null && $idFilter[1]===$index)) {
                    $temp= [
                        $dataset[2],
                        $dataset[0] === $dataset[1] ? "OK" : "NOK",
                        self::textarea($dataset[0]),
                        self::textarea($dataset[1])
                    ];
                    if ($htmlOutput) $temp[]=$dataset[1];
                    $res[]=$temp;
                }
                $index++;
            }
            $html[] = QTag::tag('h3', $test);
            $html[] = QTable::create($headers, $res, ['border' => 1]);
        }
        return join('',$html);
    }
}
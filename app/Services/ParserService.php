<?php declare(strict_types=1);

namespace App\Services;

use App\Models\Number;
use App\Models\Vehicle;
use App\Models\Good;
use Orchestra\Parser\Xml\Facade as XmlParser;


class ParserService
{
    protected string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function parsing()
    {
        $goodsIdArr = [];
        $goods = Good::all('table_id')->push();
        foreach ($goods as $idOfElem) {
            $goodsIdArr[] = $idOfElem['table_id'];
        }

        $xml = XmlParser::load($this->link);
        $data = $xml->parse([
            'goods' => [
                'uses' => 'good[id,name,price,info,counter,category,brand,designer,size,sale,img,sex]'

            ]
        ]);

        foreach ($data as $elem) {
            if (is_array($elem)) {
                foreach ($elem as $newElem) {
                    if (is_array($newElem)) {
                        foreach ($newElem as $key => $value) {
                            if ($key === 'id') {
                                $number = new Number();
                                $number->number_id = $value;
                            }
                            $number->save();
                        }
                    }
                }
            }
        }
        $numbersIdArr = [];
        $numbers = Number::all('number_id')->push();
        foreach ($numbers as $idOfElem) {
            $numbersIdArr[] = $idOfElem['number_id'];
        }
        foreach ($data as $elem) {
            if (is_array($elem)) {
                foreach ($elem as $newElem) {
                    if (is_array($newElem)) {
                        foreach ($newElem as $id => $valueId) {
                            if ($id === 'id') {
                                if (!in_array($valueId, $goodsIdArr)) {
                                    foreach ($newElem as $key => $value) {
                                        if ($key === 'id') {
                                            $good = new Good();
                                            $good->table_id = $value;
                                        } elseif ($key === 'name') {
                                            $good->name = $value;
                                        } elseif ($key === 'price') {
                                            $good->price = $value;
                                        } elseif ($key === 'info') {
                                            $good->info = $value;
                                        } elseif ($key === 'counter') {
                                            $good->counter = $value;
                                        } elseif ($key === 'category') {
                                            $good->category = $value;
                                        } elseif ($key === 'brand') {
                                            $good->brand = $value;
                                        } elseif ($key === 'designer') {
                                            $good->designer = $value;
                                        } elseif ($key === 'sex') {
                                            $good->sex = $value;
                                        } elseif ($key === 'size') {
                                            $good->size = $value;
                                        } elseif ($key === 'sale') {
                                            $good->sale = $value;
                                        } elseif ($key === 'img') {
                                            $good->img = $value;
                                        }
                                        $good->save();
                                    }
                                } else {

                                    $id = \DB::selectOne("SELECT id FROM goods WHERE table_id = :table_id", ['table_id' => $valueId]);

                                    foreach ($newElem as $key => $value) {
                                        if ($key === 'id') {
                                            $good = Good::findOrFail($id->id);
                                            $good->table_id = $value;
                                        } elseif ($key === 'name') {
                                            $good->name = $value;
                                        } elseif ($key === 'price') {
                                            $good->price = $value;
                                        } elseif ($key === 'info') {
                                            $good->info = $value;
                                        } elseif ($key === 'counter') {
                                            $good->counter = $value;
                                        } elseif ($key === 'category') {
                                            $good->category = $value;
                                        } elseif ($key === 'brand') {
                                            $good->brand = $value;
                                        } elseif ($key === 'designer') {
                                            $good->designer = $value;
                                        } elseif ($key === 'sex') {
                                            $good->sex = $value;
                                        } elseif ($key === 'size') {
                                            $good->size = $value;
                                        } elseif ($key === 'sale') {
                                            $good->sale = $value;
                                        } elseif ($key === 'img') {
                                            $good->img = $value;
                                        }
                                        $good->save();
                                    }
                                }
                            }
                        }
                    }
                }
            }

            foreach ($goodsIdArr as $actualNumber) {
                if (!in_array($actualNumber, $numbersIdArr)) {
                    $id = \DB::selectOne("SELECT id FROM goods WHERE table_id = :table_id", ['table_id' => $actualNumber]);
                    $good = Good::findOrFail($id->id);
                    $good->delete();
                }
            }
            Number::get()->each->delete();
        }
//        $xml = file_get_contents($this->link);
//        $xml_data = simplexml_load_string($xml);
//        $json = json_encode($xml_data);
//        return json_decode($json, true);
    }
}

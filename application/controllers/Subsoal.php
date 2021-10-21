<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subsoal extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("Main_model");
        $this->load->model("Other_model");
    }
    
    public function index(){
        // navbar and sidebar
        $data['menu'] = "Subsoal";

        // for title and header 
        $data['title'] = "List Sub Soal";

        // for modal 
        $data['modal'] = [
            "modal_subsoal",
            "modal_setting"
        ];
        
        // javascript 
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
            "modules/setting.js",
            "modules/subsoal.js",
            "load_data/subsoal_reload.js",
        ];

        // $this->load->view("pages/subsoal/list-soal", $data);
        $this->load->view("pages/subsoal/list", $data);
    }

    public function edit($id){
        $soal = $this->Main_model->get_one("sub_soal", ["md5(id_sub)" => $id, "hapus" => 0]);
        
        // id soal 
        $data['id'] = $id;
        $data['title'] = "List Soal " . $soal['nama_sub'];
        
        $data['menu'] = "Item";

        // for modal 
        $data['modal'] = [
            "modal_item_soal",
            "modal_setting"
        ];
        
        // javascript 
        $data['js'] = [
            "ajax.js",
            "function.js",
            "helper.js",
            "modules/setting.js",
            "modules/item_soal.js",
            // "load_data/reload_soal_listening.js",
            "load_data/item_soal_reload.js",
        ];

        // $this->load->view("pages/subsoal/list-soal", $data);
        $this->load->view("pages/subsoal/list-item", $data);
    }

    public function hasil($id){
        // navbar and sidebar
        $data['menu'] = "Soal";

        // for title and header 
        $data['title'] = "List Hasil Soal";

        $respon = $this->Main_model->get_all("peserta", ["md5(id_sub)" => $id]);
        $data['respon'] = [];
        foreach ($respon as $i => $respon) {
            $data['respon'][$i] = $respon;
            $jawaban = explode("###", $respon['text']);
            $data['respon'][$i]['text'] = $jawaban;
        }

        $this->load->view("pages/subsoal/hasil-soal", $data);
    }

    public function loadSubSoal(){
        header('Content-Type: application/json');
        $output = $this->subsoal->loadSubSoal();
        echo $output;
    }

    public function add_subsoal(){
        $data = $this->subsoal->add_subsoal();
        echo json_encode($data);
    }
    
    public function get_subsoal(){
        $data = $this->subsoal->get_subsoal();
        echo json_encode($data);
    }

    public function update_subsoal(){
        $data = $this->subsoal->update_subsoal();
        echo json_encode($data);
    }

    public function delete_subsoal(){
        $data = $this->subsoal->delete_subsoal();
        echo json_encode($data);
    }

    public function add_item_soal(){
        $data = $this->subsoal->add_item_soal();
        echo json_encode($data);
    }

    public function get_all_item_soal(){
        $data = $this->subsoal->get_all_item_soal();
        echo json_encode($data);
    }

    public function get_item_soal(){
        $data = $this->subsoal->get_item_soal();
        echo json_encode($data);
    }
    
    public function edit_item_soal(){
        $data = $this->subsoal->edit_item_soal();
        echo json_encode($data);
    }

    public function edit_urutan_soal(){
        $data = $this->subsoal->edit_urutan_soal();
        echo json_encode($data);
    }

    public function hapus_item_soal(){
        $data = $this->subsoal->hapus_item_soal();
        echo json_encode($data);
    }

    public function input($id){
        $this->Main_model->delete_data("item_soal", ["id_sub" => $id]);

        $data = [];
        
        if($id == 1){
            $data = [

                [
                    "tipe" => "petunjuk",
                    "data" => "Part A"
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 1,
                        "soal" => "",
                        "pilihan" => [
                                "Drop out of the play.",
                                "Switch parts with another actor.",
                                "Be patient about learning his part.",
                                "Have his lines memorized by tomorrow."
                            ],
                            "jawaban" => "Be patient about learning his part.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 2,
                        "soal" => "",
                        "pilihan" => [
                            "She agrees with the man.",
                            "The man missed the last study session.",
                            "She didn't understand the last chemistry class,",
                            "The man should be more serious about his studies."
                        ],
                        "jawaban" => "The man should be more serious about his studies."
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 3,
                        "soal" => "",
                        "pilihan" => [
                            "He can't meet the woman at the engineering building.",
                            "He can't give the woman a ride.",
                            "He has already passed the engineering building.",
                            "He'll meet the appointment. Woman after"
                        ],
                        "jawaban" => "He can't give the woman a ride.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 4,
                        "soal" => "",
                        "pilihan" => [
                            "He'll give the quiz at a later time.",
                            "The quiz will be very short.",
                            "The quiz won't be ready until Thursday.",
                            "He'll score the quiz quickly."
                        ],
                        "jawaban" => "He'll give the quiz at a later time.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 5,
                        "soal" => "",
                        "pilihan" => [
                            "Take the medicine as she was directed to do.",
                            "Schedule another appointment with her doctor.",
                            "Stop taking the medicine.",
                            "Rest her back for a few days."
                        ],
                        "jawaban" => "Take the medicine as she was directed to do.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 6,
                        "soal" => "",
                        "pilihan" => [
                            "Decide which movie to see.",
                            "Order his food quickly.",
                            "Go to a later movie.",
                            "Go to a different restaurant."
                        ],
                        "jawaban" => "Order his food quickly.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 7,
                        "soal" => "",
                        "pilihan" => [
                            "She doesn't like to watch basketball.",
                            "She would like the man to accompany her to the game.",
                            "She doesn't have a television.",
                            "She'll sell the man her ticket."
                        ],
                        "jawaban" => "She'll sell the man her ticket."
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 8,
                        "soal" => "",
                        "pilihan" => [
                            "She needs to find a new place to live.",
                            "She spends a lot of time in the library.",
                            "She prefers to study at home.",
                            "She needs to return some books to the library."
                        ],
                        "jawaban" => "She spends a lot of time in the library.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 9,
                        "soal" => "",
                        "pilihan" => [
                            "Spend more time outdoors.",
                            "Take short naps during the day.",
                            "Try to get to bed earlier.",
                            "Stay indoors until he feels better."
                        ],
                        "jawaban" => "Spend more time outdoors.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 10,
                        "soal" => "",
                        "pilihan" => [
                            "Sharpen the man,s pencil.",
                            "Give the man a new sheet of paper.",
                            "Show the man a drawing technique.",
                            "Ask the model to move his arm."
                        ],
                        "jawaban" => "Show the man a drawing technique.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 11,
                        "soal" => "",
                        "pilihan" => [
                            "Lend the man some money.",
                            "Take the man to the bank.",
                            "Ask the man when he'll be paid.",
                            "Ask the man to write her a check."
                        ],
                        "jawaban" => "Lend the man some money.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 12,
                        "soal" => "",
                        "pilihan" => [
                            "She forgot to call the man.",
                            "Her answering machine is broken.",
                            "She didn't get the man's messages.",
                            "She couldn't remember the man's phone number."
                        ],
                        "jawaban" => "She forgot to call the man.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 13,
                        "soal" => "",
                        "pilihan" => [
                            "He received permission to carry on an extra bag.",
                            "He doesn't know the woman ahead of him.",
                            "He's carrying someone else's suitcase.",
                            "He'd like some help at the baggage counter."
                        ],
                        "jawaban" => "He's carrying someone else's suitcase.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 14,
                        "soal" => "",
                        "pilihan" => [
                            "Travel into the city on another day.",
                            "Pick up her medicine before they leave.",
                            "Avoid driving after taking her medicine.",
                            "Wait to take her medicine until after their trip."
                        ],
                        "jawaban" => "Avoid driving after taking her medicine.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 15,
                        "soal" => "",
                        "pilihan" => [
                            "The air will be cleaner if they go to a different city.",
                            "It'll soon be too late to control the pollution.",
                            "Society will not pay attention to the new laws.",
                            "The situation will improve if changes are made."
                        ],
                        "jawaban" => "The situation will improve if changes are made."
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 16,
                        "soal" => "",
                        "pilihan" => [
                            "He didn't have time to look for his jacket.",
                            "He misunderstood the weather report.",
                            "He didn't know it would be cold.",
                            "He forgot to bring his jacket."
                        ],
                        "jawaban" => "He didn't know it would be cold.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 17,
                        "soal" => "",
                        "pilihan" => [
                            "Attend a conference with her.",
                            "Mail her the paper after the deadline.",
                            "Submit a handwritten draft of the paper.",
                            "Complete the course without submitting the paper."
                        ],
                        "jawaban" => "Mail her the paper after the deadline.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 18,
                        "soal" => "",
                        "pilihan" => [
                            "He saw Mary earlier.",
                            "Someone else saw Mary.",
                            "He can't help the woman.",
                            "Mary asked for directions to the office."
                        ],
                        "jawaban" => "He can't help the woman.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 19,
                        "soal" => "",
                        "pilihan" => [
                            "She fell asleep before the program ended.",
                            "She especially enjoyed the end of the program.",
                            "She missed the beginning of the program.",
                            "She wishes she had gone to sleep earlier."
                        ],
                        "jawaban" => "She fell asleep before the program ended.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 20,
                        "soal" => "",
                        "pilihan" => [
                            "He doesn't like to take pills.",
                            "He may not be able to wake up.",
                            "He may feel better soon.",
                            "He may want to take the pills without food."
                        ],
                        "jawaban" => "He may want to take the pills without food."
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 21,
                        "soal" => "",
                        "pilihan" => [
                            "Apologize when Deborah is less angry.",
                            "Return Deborah's notes in a few days.",
                            "Write Deborah a note of apology.",
                            "Let her talk to Deborah about the situation."
                        ],
                        "jawaban" => "Apologize when Deborah is less angry.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 22,
                        "soal" => "",
                        "pilihan" => [
                            "Shop for new clothes.",
                            "Lose some weight.",
                            "Have his jeans altered.",
                            "Wear clothes that fit more tightly."
                        ],
                        "jawaban" => "Lose some weight.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 23,
                        "soal" => "",
                        "pilihan" => [
                            "Lisa is often late for meetings.",
                            "Lisa has a busy schedule.",
                            "Lisa's flight was delayed,",
                            "Lisa's missed her flight."
                        ],
                        "jawaban" => "Lisa has a busy schedule.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 24,
                        "soal" => "",
                        "pilihan" => [
                            "The cologne has a strong smell.",
                            "She likes the cologne.",
                            "She can hardly smell the cologne.",
                            "The cologne must be very expensive."
                        ],
                        "jawaban" => "The cologne has a strong smell.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 25, 
                        "soal" => "",
                        "pilihan" => [
                            "He hasn't done any work yet.",
                            "He doesn't know what topic to research.",
                            "He withdrew from his computer class.",
                            "He's in a hurry to finish his paper."
                        ],
                        "jawaban" => "He hasn't done any work yet.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 26,
                        "soal" => "",
                        "pilihan" => [
                            "He's a linguistics major.",
                            "He wants to take &quot;The Psychology Language.&quot;",
                            "He and the woman are taking the same course.",
                            "He  hasn't chosen his courcector for next semester."
                        ],
                        "jawaban" => "He wants to take &quot;The Psychology Language.&quot;",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 27,
                        "soal" => "",
                        "pilihan" => [
                            "Taking an airplane might be more practical.",
                            "She doesn't care how long the trip takes.",
                            "It doesn't take long to get to Philadelphia.",
                            "She'd rather take a direct train."
                        ],
                        "jawaban" => "Taking an airplane might be more practical.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 28,
                        "soal" => "",
                        "pilihan" => [
                            "She's not usually interested in watching documentaries.",
                            "She doesn't have time to help the man with his project.",
                            "She knew that the program was being shown.",
                            "She didn't watch the program."
                        ],
                        "jawaban" => "She knew that the program was being shown.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 29,
                        "soal" => "",
                        "pilihan" => [
                            "Not many people know the song.",
                            "He doesn't know the song well enough to play it.",
                            "He hasn't been playing the piano long.",
                            "People often ask him to play the song."
                        ],
                        "jawaban" => "People often ask him to play the song."
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 30,
                        "soal" => "",
                        "pilihan" => [
                            "She's annoyed with the man.",
                            "She wants the man to do the laundry.",
                            "She doesn't know how to deal with the problem,",
                            "She's not upset about the spill."
                        ],
                        "jawaban" => "She's not upset about the spill."
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <b>Part B</b>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 31,
                        "soal" => "",
                        "pilihan" => [
                            "The effect of the atmosphere on rainfall.",
                            "How conditions on Earth support life.",
                            "How water originated on Earth.",
                            "A new estimate of the age of Earth."
                        ],
                        "jawaban" => "How water originated on Earth.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 32, 
                        "soal" => "",
                        "pilihan" => [
                            "The surface of the ocean is expanding.",
                            "Volcanic activity is increasing.",
                            "The surface of Earth contains tons of cosmic dust.",
                            "Thousands of comets are colliding with Earth's atmosphere."
                        ],
                        "jawaban" => "Thousands of comets are colliding with Earth's atmosphere."
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 33,
                        "soal" => "",
                        "pilihan" => [
                            "Disintegrating comets.",
                            "Gases in the atmosphere.",
                            "Underground water that rose to the surface.",
                            "Water vapor"
                        ],
                        "jawaban" => "Disintegrating comets.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 34,
                        "soal" => "",
                        "pilihan" => [
                            "Biologists.",
                            "Geologists.",
                            "Oceanographers.",
                            "Astronomers"
                        ],
                        "jawaban" => "Geologists.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 35, 
                        "soal" => "",
                        "pilihan" => [
                            "They are found under the oceans.",
                            "They were most active when Earth was first formed.",
                            "Their emissions created the Earth's atmosphere.",
                            "Their fumes are mostly water."
                        ],
                        "jawaban" => "Their fumes are mostly water."
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 36,
                        "soal" => "",
                        "pilihan" => [
                            "She felt embarrassed in class.",
                            "Her presentation received a poor grade.",
                            "She had not completed her assignment.",
                            "She was unable to attend her psychology class."
                        ],
                        "jawaban" => "She felt embarrassed in class.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 37, 
                        "soal" => "",
                        "pilihan" => [
                            "She'd be able to leave quickly.",
                            "She'd be less nervous.",
                            "She'd be able to locate where the man was seated.",
                            "She'd know when her professor arrived."
                        ],
                        "jawaban" => "She'd be less nervous.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 38,
                        "soal" => "",
                        "pilihan" => [
                            "They blush more readily than women do.",
                            "They're uncomfortable performing in front of adults.",
                            "They don't respond to stress well.",
                            "They blush less frequently than adults do."
                        ],
                        "jawaban" => "They blush less frequently than adults do."
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 39, 
                        "soal" => "",
                        "pilihan" => [
                            "To introduce the woman to someone who has researched blushing.",
                            "To illustrate the benefits of a publicspeaking",
                            "To give an example of someone who blushes easily.",
                            "To explain a way to overcome blushing."
                        ],
                        "jawaban" => "To give an example of someone who blushes easily.",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <b>Part C</b>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 40,
                        "soal" => "",
                        "pilihan" => [
                            "To plan ways to prevent hearing damage.",
                            "To inform them about contagious ear infections.",
                            "To explain part of the physical exam entering students must have.",
                            "To provide background information for their course work."
                        ],
                        "jawaban" => "To plan ways to prevent hearing damage.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 41,
                        "soal" => "",
                        "pilihan" => [
                            "Staff who specialize in hearing loss have been hired.",
                            "The noise made by the traffic near the center has become worse.",
                            "An increase in patients with hearing problems has been noticed.",
                            "course to introduce students to medical careers has been set up."
                        ],
                        "jawaban" => "An increase in patients with hearing problems has been noticed.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 42,
                        "soal" => "",
                        "pilihan" => [
                            "Information on sources of infection.",
                            "Suggestions on how to treat hearing loss.",
                            "A chart of sounds and decibel levels.",
                            "A list of doctors who test hearing."
                        ],
                        "jawaban" => "A chart of sounds and decibel levels.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 43,
                        "soal" => "",
                        "pilihan" => [
                            "The traffic next to campus.",
                            "Horns at football games.",
                            "Low-flying airplanes.",
                            "Loud equipment at the health center."
                        ],
                        "jawaban" => "Horns at football games.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 44,
                        "soal" => "",
                        "pilihan" => [
                            "To introduce an important author.",
                            "To compare two different forms of writing.",
                            "To discuss the differences between Northern and Southern writers.",
                            "To explain why a particular book was written."
                        ],
                        "jawaban" => "To introduce an important author.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 45,
                        "soal" => "",
                        "pilihan" => [
                            "It doesn't include the use of dialect.",
                            "It is considered Stowe's best written work.",
                            "It was not published in the nineteenth century.",
                            "It was Stowe's most popular work."
                        ],
                        "jawaban" => "It was Stowe's most popular work."
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 46,
                        "soal" => "",
                        "pilihan" => [
                            "To give an example of someone who was the subject of one of Stowe's biographies.",
                            "To give an example of another author who used local dialect in his writing.",
                            "To suggest that his work was less popular than Stowe's.",
                            "To point out another author who wrote about New England."
                        ],
                        "jawaban" => "To give an example of another author who used local dialect in his writing.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 47,
                        "soal" => "",
                        "pilihan" => [
                            "A children's geography book.",
                            "A collection of travel stories.",
                            "A biographical sketch.",
                            "Uncle Tom's Cabin."
                        ],
                        "jawaban" => "A children's geography book.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 48,
                        "soal" => "",
                        "pilihan" => [
                            "A term for a type of bank.",
                            "A special place for pigs.",
                            "A kind of iron.",
                            "A theory about the economy of the Middle Ages."
                        ],
                        "jawaban" => "A term for a type of bank.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 49,
                        "soal" => "",
                        "pilihan" => [
                            "Money.",
                            "Pottery.",
                            "Bricks.",
                            "Nests."
                        ],
                        "jawaban" => "Pottery.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 50,
                        "soal" => "",
                        "pilihan" => [
                            "It held dirt well.",
                            "It was long-lasting.",
                            "It symbolized wealth.",
                            "It was inexpensive."
                        ],
                        "jawaban" => "It was inexpensive."
                    ]
                ],
            ];
        } else if($id == 2){
            $data = [

                [
                    "tipe" => "petunjuk",
                    "data" => "<b>Structure</b>"
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 1,
                        "soal" => "Fingerprints form an unchangeable signature, and ... for identification, despite changes in the individual's appearance or age.",
                        "pilihan" => [
                            "the use of fingerprint records",
                            "with the use of fingerprint records",
                            "when fingerprint records are used",
                            "fingerprint records can be used"
                        ],
                        "jawaban" => "fingerprint records can be used"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 2,
                        "soal" => "Animals obtain their energy from ...",
                        "pilihan" => [
                            "eat their food",
                            "their food to eat",
                            "the food they eat",
                            "they eat the food"
                        ],
                        "jawaban" => "the food they eat",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 3,
                        "soal" => "Liquid water has fewer hydrogen bonds than ice, so more molecules can occupy the same space, making liquid water ……. than ice.",
                        "pilihan" => [
                            "more dense",
                            "is more dense",
                            "more than dense",
                            "as more dense"
                        ],
                        "jawaban" => "more dense",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 4,
                        "soal" => "It is difficult for present-day readers ... Sister Carrie was withdrawn from circulation at the turn of the century.",
                        "pilihan" => [
                            "to understand the no",
                            "why to understand the novel",
                            "the novel to understand why",
                            "to understand why the novel"
                        ],
                        "jawaban" => "to understand why the novel"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 5,
                        "soal" => "Historical linguists study ... over time.",
                        "pilihan" => [
                            "languages evolve",
                            "whether language evolution",
                            "how languages evolve",
                            "evolution that languages"
                        ],
                        "jawaban" => "how languages evolve",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 6,
                        "soal" => "Tennis star Chris Event, who retired from the game after eighteen years, perhaps ….. more than anyone to make women's professional tennis a widely respected career.",
                        "pilihan" => [
                            "who did",
                            "has done",
                            "and doing",
                            "to do"
                        ],
                        "jawaban" => "has done",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 7,
                        "soal" => "The daytime…… bright because the Earth's atmosphere scatters sunlight.",
                        "pilihan" => [
                            "while sky is",
                            "has a sky",
                            "sky is",
                            "for the sky"
                        ],
                        "jawaban" => "sky is",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 8,
                        "soal" => "Edward Hopper's paintings portray the loneliness and isolation of the individual….",
                        "pilihan" => [
                            "is in an urbanized society",
                            "in society is urbanized",
                            "who in an urbanized society",
                            "in an urbanized society"
                        ],
                        "jawaban" => "in an urbanized society"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 9,
                        "soal" => "Braille, ... printing reading materials for use by people who are blind, consists of a system of raised points or dots that are read by touch.",
                        "pilihan" => [
                            "is a method of",
                            "a method of",
                            "which a method of",
                            "a method is of"
                        ],
                        "jawaban" => "a method of",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 10,
                        "soal" => "The art of landscape architecture is almost as old….. of architecture itselt. Alas that",
                        "pilihan" => [
                            "as that",
                            "that ",
                            "as",
                            "than that"
                        ],
                        "jawaban" => "as that",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 11,
                        "soal" => "The development of synthetic fibers after 1940 led to the production of new types of fabrics …..more durable and easier to care for.",
                        "pilihan" => [
                            "that they were",
                            "I that were",
                            "were",
                            "and were"
                        ],
                        "jawaban" => "I that were",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 12,
                        "soal" => "Until the eighteenth century, charcoal was used in blast furnaces, as….. well as in glassmaking, blacksmithing, and metalworking.",
                        "pilihan" => [
                            "what the chief fuel",
                            "the chief fuel that",
                            "the chief fuel was",
                            "the chief fuel"
                        ],
                        "jawaban" => "the chief fuel"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 13,
                        "soal" => "Pure iron cannot be hardened by heating and cooling, as ..., because iron lacks the necessary",
                        "pilihan" => [
                            "Steel it can",
                            "can steel",
                            "with steel can",
                            "so can steel"
                        ],
                        "jawaban" => "can steel",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 14,
                        "soal" => "Rapids and waterfalls,….. along Virtually Massachusetts waterways, provided power in colonial times for grist and saw mills and later for textile mills.",
                        "pilihan" => [
                            "common",
                            "were common",
                            "which, being common",
                            "being common, were"
                        ],
                        "jawaban" => "common",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 15,
                        "soal" => "Airsickness is produced by a disturbance of the inner car, ... psychogenic factors, such as fear, also play a part.",
                        "pilihan" => [
                            "in spite of",
                            "neither",
                            "nor",
                            "although"
                        ],
                        "jawaban" => "although"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 16,
                        "soal" => "A large <u>collections</u> of materials <u>focused</u> on Louisiana's <u>history</u> and culture is <u>provided</u> by the A B Williams Research Center in New Orleans.",
                        "pilihan" => [
                            "collections",
                            "focused",
                            "history",
                            "provided"
                        ],
                        "jawaban" => "collections",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 17,
                        "soal" => "Mary Austin's <u>first</u> book, The Land of Little Rain, <u>a description</u> of desert life in the western United States, won <u>she</u> immediate <u>fame</u> in 1903.",
                        "pilihan" => [
                            "first",
                            "a description",
                            "she",
                            "fame"
                        ],
                        "jawaban" => "she",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 18,
                        "soal" => "The <u>most abundant</u> phosphate mineral, appetite, includes several <u>type</u> that vary <u>in</u> their <u>content</u> of fluorine, chlorine, or hydroxyl ions.",
                        "pilihan" => [
                            "most abundant",
                            "type",
                            "in",
                            "content"
                        ],
                        "jawaban" => "type",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 19,
                        "soal" => "Having gained a reputation <u>as</u> a daring, intrepid journalist, Nellie Bly became the <u>first</u> female <u>report</u> assigned to the Eastern front <u>during</u> the First World War.",
                        "pilihan" => [
                            "as",
                            "first",
                            "report",
                            "during"
                        ],
                        "jawaban" => "report",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 20,
                        "soal" => "In 1862 Abraham Lincoln signed the Homestead Act, <u>allows</u> <u>settlers</u> 160 acres of <u>free land</u> after they had worked it <u>for</u> five years.",
                        "pilihan" => [
                            "allows",
                            "settlers",
                            "free land",
                            "for"
                        ],
                        "jawaban" => "allows",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 21,
                        "soal" => "<u>Along</u> with the other physical sciences, meteorology has <u>developed</u> in the past three centuries from myth and folklore to <u>rigorous observation</u>, computation, and <u>analyze</u>.",
                        "pilihan" => [
                            "Along",
                            "developed",
                            "rigorous observation",
                            "analyze"
                        ],
                        "jawaban" => "analyze"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 22,
                        "soal" => "In 1973 the United States armed forces <u>were</u> placed on an all-volunteer <u>basis</u> for <u>a</u> first time <u>since</u> 1948.",
                        "pilihan" => [
                            "were",
                            "basis",
                            "a",
                            "since"
                        ],
                        "jawaban" => "a",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 23,
                        "soal" => "Because lions do not have exceptional <u>speedy</u>, <u>they</u> must rely on the element of <u>surprise</u> for the <u>hunt</u>.",
                        "pilihan" => [
                            "speedy",
                            "they",
                            "surprise",
                            "hunt"
                        ],
                        "jawaban" => "speedy",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 24,
                        "soal" => "The <u>position</u> of the Earth's magnetic poles <u>is</u> not constant but shows <u>an</u> appreciable change <u>after</u> year to year.",
                        "pilihan" => [
                            "position",
                            "is",
                            "an",
                            "after"
                        ],
                        "jawaban" => "after"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 25,
                        "soal" => "Grassland vegetation reduces <u>competition</u> for water <u>among species</u> by <u>concentrates</u> roots at <u>different</u> levelus.",
                        "pilihan" => [
                            "competition",
                            "among species",
                            "concentrates",
                            "different"
                        ],
                        "jawaban" => "concentrates",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 26,
                        "soal" => "<u>Like</u> the giant reptiles, most lineage's of organisms have <u>eventually</u> become extinct; still, some exist that have changed very <u>little</u> in millions of <u>year</u>.",
                        "pilihan" => [
                            "Like",
                            "eventually",
                            "little",
                            "year"
                        ],
                        "jawaban" => "year"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 27,
                        "soal" => "<u>Demonstrations</u> public are an <u>effective means</u> by which advocacy groups can bring inequalities to the <u>attention</u> of local, state, and federal <u>officials</u>.",
                        "pilihan" => [
                            "Demonstrations",
                            "effective means",
                            "attention",
                            "officials"
                        ],
                        "jawaban" => "Demonstrations",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 28,
                        "soal" => "Methods used in <u>preparing</u> articles for an encyclopedia <u>differs</u>, <u>depending</u> on the <u>length</u> of the article.",
                        "pilihan" => [
                            "preparing",
                            "differs",
                            "depending",
                            "length"
                        ],
                        "jawaban" => "differs",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 29,
                        "soal" => "<u>Since</u> the advent of rock <u>music</u> in the 1950's, the popular music of the United States has become a <u>significant</u> musical influence <u>around world</u>.",
                        "pilihan" => [
                            "Since",
                            "music",
                            "significant",
                            "around world"
                        ],
                        "jawaban" => "around world"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 30,
                        "soal" => "Could droplets <u>and</u> ice crystals <u>first form</u> certain <u>types</u> of small particles of dust or <u>another</u> airborne materials.",
                        "pilihan" => [
                            "and",
                            "first form",
                            "types",
                            "another"
                        ],
                        "jawaban" => "another"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 31,
                        "soal" => "<u>Male</u> fiddler crabs have huge claws that move back and forth <u>similar</u> violinists move <u>their</u> arms when <u>playing</u> the violin.",
                        "pilihan" => [
                            "Male",
                            "similar",
                            "their",
                            "playing"
                        ],
                        "jawaban" => "similar",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 32,
                        "soal" => "Daylight saving time <u>came</u> into <u>useful</u> in the United States in an effort to conserve electricity by <u>having</u> business hours correspond to the hours of <u>natural</u> daylight.",
                        "pilihan" => [
                            "came",
                            "useful",
                            "having",
                            "natural"
                        ],
                        "jawaban" => "useful",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 33,
                        "soal" => "Almost <u>every</u> fruits and vegetables contain riboflavin; the <u>richest</u> sources are <u>leafy</u> green vegetables <u>such</u> as spinach, kale, or turnip greens.",
                        "pilihan" => [
                            "every",
                            "richest",
                            "leafy",
                            "such"
                        ],
                        "jawaban" => "every",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 34,
                        "soal" => "Gold lends <u>itself</u> to the <u>making</u> of decorative articles <u>because</u> of its great <u>resistant</u> to corrosion and tarnish and its ease of working.",
                        "pilihan" => [
                            "itself",
                            "making",
                            "because",
                            "resistant"
                        ],
                        "jawaban" => "resistant"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 35,
                        "soal" => "Ethics is the branch of philosophy that <u>deals with</u> values of  <u>life</u> in a coherent, <u>systematic</u>, and <u>science</u> manner.",
                        "pilihan" => [
                            "deals with",
                            "life",
                            "systematic",
                            "science"
                        ],
                        "jawaban" => "science"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 36,
                        "soal" => "<u>Indiscriminately</u> dumping of waste materials and <u>adequate</u> sewage treatment are two <u>serious</u> causes of <u>environmental</u> pollution.",
                        "pilihan" => [
                            "Indiscriminately",
                            "adequate",
                            "serious",
                            "environmental"
                        ],
                        "jawaban" => "Indiscriminately",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 37,
                        "soal" => "The <u>builders</u> of the <u>yariety</u> ancient cliff ruins <u>scattered</u> throughout the canyons and mesas of the <u>arid</u> Southwest of the United States are known as the cliff dwellers.",
                        "pilihan" => [
                            "builders",
                            "yariety",
                            "scattered",
                            "arid"
                        ],
                        "jawaban" => "yariety",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 38,
                        "soal" => "A fragrant <u>plant</u> has tiny sacs that <u>makes and stores</u> the <u>substances</u> that give <u>it</u> a pleasant odor.",
                        "pilihan" => [
                            "plant",
                            "makes and stores",
                            "substances",
                            "it"
                        ],
                        "jawaban" => "makes and stores",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 39,
                        "soal" => "Nomadic hunter and gatherer societies have access to only a <u>limited</u> amount of food <u>in an area</u> and <u>moved on</u> when they have exhausted each <u>locality</u>.",
                        "pilihan" => [
                            "limited",
                            "in an area",
                            "moved on",
                            "locality"
                        ],
                        "jawaban" => "moved on",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 40,
                        "soal" => "Collagen, a <u>strong</u> rubbery protein, <u>supports the</u> ear flaps and the tip <u>of nose</u> in <u>humans</u>.",
                        "pilihan" => [
                            "strong",
                            "supports the",
                            "of nose",
                            "humans"
                        ],
                        "jawaban" => "humans"
                    ]
                ],
            ];
        } else if($id == 3){
            $data = [
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <b>Reading</b>"
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p>Questions 1-10</p>
                        <p>Potash (the old name for potassium carbonate) is one of the two alkalis (the other being soda, sodium carbonate) that were used from remote antiquity in the making of glass, and from the early Middle Ages in the making of soap: the former being the product of heating a mixture of alkali and sand, Line <u><b>the latter</b></u> a product of alkali and vegetable oil. Their importance in the communities of colonial North America need hardly <u><b>be stressed</b></u>. </p>
                        <p>Potash and soda are not <u><b>interchangeable</b></u> for all purposes, but for glass-or soap- making either would do. Soda was obtained largely from the ashes of certain Mediterranean sea plants, potash from those of inland vegetation. Hence potash was more familiar to the early European settlers of the North American continent. </p>
                        <p>The settlement at Jamestown in Virginia was in many ways a microcosm of the economy of colonial North America, and potash was one of its first concerns. It was required for the glassworks, the first factory in the British colonies, and was produced in sufficient quantity to permit the inclusion of potash in the first cargo shipped out of Jamestown. The second ship to arrive in the settlement from England included among its passengers experts in potash making.</p>
                        <p>The method of making potash was simple enough. Logs was piled up and burned in the open, and the ashes collected. The ashes were placed in a barrel with holes in the bottom, and water was poured over them. The solution draining from the barrel was boiled down in iron kettles. The resulting mass was further heated to fuse the mass into what was called potash. </p>
                        <p>In North America, potash making quickly became an <u><b>adjunct</b></u> to the clearing of land for agriculture, for it was estimated that as much as half the cost of clearing land could be recovered by the sale of potash. Some potash was exported from Maine and New Hampshire in the seventeenth century, but the market turned out to be mainly domestic, consisting mostly of shipments from the northern to the southern colonies. For despite the beginning of the trade at Jamestown and such encouragements as a series of acts &quot;to encourage the making of potash,&quot; beginning in 1707 in South Carolina, the softwoods in the South proved to be poor sources of the substance</p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 1,
                        "soal" => "What aspect of potash does the passage mainly discuss?",
                        "pilihan" => [
                            "How it was made",
                            "Its value as a product for export",
                            "How it differs from other alkalis",
                            "Its importance in colonial North America"
                        ],
                        "jawaban" => "Its importance in colonial North America"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 2,
                        "soal" => "All of the following statements are true of both potash and soda EXPECT…",
                        "pilihan" => [
                            "They are alkalis.",
                            "They are made from sea plants.",
                            "They are used in making soap.",
                            "They are used in making glass."
                        ],
                        "jawaban" => "They are made from sea plants.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 3,
                        "soal" => "They phrase &quot;the latter&quot; in paragraph 1 refers to…",
                        "pilihan" => [
                            "alkali",
                            "glass",
                            "sand",
                            "soap"
                        ],
                        "jawaban" => "soap"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 4,
                        "soal" => "The word &quot;stressed&quot; in paragraph 1 is closest in meaning TO",
                        "pilihan" => [
                            "defined",
                            "emphasized",
                            "adjusted",
                            "mentioned"
                        ],
                        "jawaban" => "emphasized",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 5,
                        "soal" => "The word &quot;interchangeable&quot; in paragraph 2 is closest in potash and soda EXPECT... meaning to …",
                        "pilihan" => [
                            "convenient",
                            "identifiable",
                            "equivalent",
                            "advantageous"
                        ],
                        "jawaban" => "equivalent",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 6,
                        "soal" => "It can be inferred from the passage that potash was more common than soda in colonial North America because ...",
                        "pilihan" => [
                            "the materials needed for making soda were not readily available",
                            "making potash required less time than making soda",
                            "potash was better than soda for making glass and soap",
                            "the colonial glassworks found soda more difficult to use"
                        ],
                        "jawaban" => "the materials needed for making soda were not readily available",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 7,
                        "soal" => "According to paragraph 4, all of the following were needed for making potash EXCEPT...",
                        "pilihan" => [
                            "wood",
                            "fire",
                            "sand",
                            "water"
                        ],
                        "jawaban" => "sand",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 8,
                        "soal" => "The word &quot;adjunct&quot; in paragraph 5 is closest in meaning",
                        "pilihan" => [
                            "addition",
                            "answer",
                            "problem",
                            "possibility"
                        ],
                        "jawaban" => "addition",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 9,
                        "soal" => "According to the passage, a major benefit of making potash was that..",
                        "pilihan" => [
                            "it could be exported to Europe in exchange for other goods",
                            "it helped finance the creation of farms",
                            "it could be made with a variety of materials",
                            "stimulated the development of new ways of glassmaking"
                        ],
                        "jawaban" => "it helped finance the creation of farms",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 10,
                        "soal" => "According to paragraph 5, the softwoods in the South posed which of the following problems for southern settles?",
                        "pilihan" => [
                            "The softwoods were not very plentiful.",
                            "The softwoods could not be used to build houses.",
                            "The softwoods were not very marketable.",
                            " The softwoods were not very useful for making potash."
                        ],
                        "jawaban" => " The softwoods were not very useful for making potash."
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p><b>Questions 11-21</b></p>
                        <p>The first flying vertebrates were true reptiles in which one of the fingers of the front limbs becamevery elongated, providing support for a flap of stretched skin that served as a wing. These were the pterosaurs, <u><b>literally</b></u> the &quot;winged lizards.&quot; The earliest pterosaurs arose near the end of the Triassic period Line of the Mesozoic Era, some 70 million years before the first known fossils of true birds occur, and they presumably dominated the skies until they were eventually displaced by birds. Like the dinosaurs, some the pterosaurs became gigantic; the largest fossil discovered is of an individual that had a wingspan of 50 feet or more, larger than many <u><b>airplanes</b></u>. These flying reptiles had large, tooth-filled jaws, but their bodies were small and probably without the necessary powerful muscles for sustained wing movement. <u><b>They</b></u> must have been expert gliders, not skillful fliers, relying on wind power for their locomotion. </p>
                        <p>Birds, despite sharing common reptilian ancestors with pterosaurs, evolved quite separately and have been much more successful in their dominance of the air. They are an example of a common theme in evolution, the more or less parallel development of different types of body structure and function for the same reason-in this case, for flight. Although the fossil record, as always, is not complete enough to determine definitively the evolutionary lineage of the birds or in as much detail as one would like, it is better in this case than for many other animal groups. That is because of the unusual preservation in a limestone quarry in southern Germany of Archaeopteryx, a fossil that many have called the link between dinosaurs and birds. Indeed, had it not been for the superb preservation of these fossils, they might well have been <u><b>classified</b></u> as dinosaurs. They have the skull and teeth of a reptile as well as a bony tail, but in the line-grained limestone in which these fossils occur there are delicate impressions of feathers and fine details of bone structure that make it clear that Archaeopteryx was a bird. All birds living today, from the great condors of the Andes to the tiniest wrens, race their origin back to the Mesozoic dinosaurs.</p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 11,
                        "soal" => "What does the passage mainly discuss?",
                        "pilihan" => [
                            "Characteristics of pterosaur wings",
                            "The discovery of fossil remains of Archaeopteryx",
                            "Reasons for the extinction of early flying vertebrates",
                            "The development of flight in reptiles and birds"
                        ],
                        "jawaban" => "The development of flight in reptiles and birds"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 12,
                        "soal" => "Which of the following is true of early reptile wings?",
                        "pilihan" => [
                            "They evolved from strong limb muscles.",
                            "They consisted of an extension of skin.",
                            "They connected the front and back limbs.",
                            "They required fingers of equal length"
                        ],
                        "jawaban" => "They consisted of an extension of skin.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 13,
                        "soal" => "The word &quot;literally&quot; in paragraph 1 is closest in meaning To….",
                        "pilihan" => [
                            "creating",
                            "meaning",
                            "related to",
                            "simplified"
                        ],
                        "jawaban" => "meaning",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 14,
                        "soal" => "It can be inferred from the passage that birds were probably dominant in the skies ...",
                        "pilihan" => [
                            "in the early Triassic period",
                            "before the appearance of pterosaurs",
                            "after the decline of pterosaurs",
                            "before dinosaurs could be found on land."
                        ],
                        "jawaban" => "after the decline of pterosaurs",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 15,
                        "soal" => "The author mentions airplanes in paragraph 1 in order To..",
                        "pilihan" => [
                            "illustrate the size of wingspans in some pterosaurs",
                            "compare the energy needs of dinosaurs with those of modern machines",
                            "demonstrate the differences between mechanized flight and animal flight",
                            "establish the practical applications of the study of fossils"
                        ],
                        "jawaban" => "illustrate the size of wingspans in some pterosaurs",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 16,
                        "soal" => "The word &quot;They&quot; in paragraph 1 refers to ...",
                        "pilihan" => [
                            "powerful muscles",
                            "bodies",
                            "jaws",
                            "flying reptiles"
                        ],
                        "jawaban" => "flying reptiles"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 17,
                        "soal" => "According to the passage, pterosaurs were probably &quot;not skillful fliers&quot; (line 9) because ...",
                        "pilihan" => [
                            "of their limited wingspan",
                            "of their disproportionately large bodies",
                            "they lacked muscles needed for extended flight",
                            "climate conditions of the time provided insufficient wind power"
                        ],
                        "jawaban" => "they lacked muscles needed for extended flight",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 18,
                        "soal" => "In paragraph 2, the author discusses the development of flight in birds as resulting from",
                        "pilihan" => [
                            "a similarity in body structure to pterosaurs",
                            "an evolution from pterosaurs",
                            "the dominance of birds and pterosaurs over land animals",
                            "a separate but parallel development process to that of pterosaurs"
                        ],
                        "jawaban" => "a separate but parallel development process to that of pterosaurs"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 19,
                        "soal" => "The word &quot;classified&quot; in paragraph 2 is closest in meaning to….",
                        "pilihan" => [
                            "perfected",
                            "replaced",
                            "categorized",
                            "protected"
                        ],
                        "jawaban" => "categorized",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 20,
                        "soal" => "Which of the following helped researchers determine that Archaeopteryx was Not dinosaurs?",
                        "pilihan" => [
                            "Its tail",
                            "Its teeth",
                            "The shape of its skull",
                            "Details of its bone structure"
                        ],
                        "jawaban" => "Details of its bone structure"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 21,
                        "soal" => "What is the significance of the discovery that wasmade in southern Germany?",
                        "pilihan" => [
                            "It is thought to demonstrate that birds evolved from dinosaurs.",
                            "It is proof that the climate and soils of Europe have changed over time.",
                            "It suggests that dinosaurs were dominant in areas rich in limestone.",
                            "It supports the theory that Archaeopteryx was a powerful dinosaur."
                        ],
                        "jawaban" => "It is thought to demonstrate that birds evolved from dinosaurs.",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p><b>Questions 22-31</b></p>
                        <p>In July of 1994, an astounding series of events took place. The world anxiously watched as, every few hours, a hurtling chunk of comet plunged into the atmosphere of Jupiter. All of the twenty-odd fragments, <u><b>collectively</b></u> called comet Shoemaker-Levy 9 after its discoverers, were once part of the same Line object, now dismembered and strung out along the same orbit. This cometary train, glistening like a string of pearls, had been first glimpsed only a few months before its fateful impact with Jupiter, and rather quickly scientists had predicted that the fragments were on a collision course with the giant planet. The impact caused an explosion clearly visible from Earth, a bright flaming fire that quickly expanded as each icy mass <u><b>incinerated</b></u> it self. When each fragment slammed at 60 kilometers per second into the dense atmosphere, its immense kinetic energy was transformed into heat, producing a superheated fireball that was ejected back through the tunnel the fragment had made a few seconds earlier.</p>
                        <p>The residues from these explosions left huge black marks on the face of Jupiter, some of which have stretched out to form dark ribbons. Although this impact event was of considerable scientific import, it especially piqued public curiosity and interest. Photographs of each collision made the evening television newscast and were posted on the Internet. This was possibly the most open scientific endeavor in history. The face of the largest planet in the solar system was changed before our very eyes. And for the very first time, most of humanity came to fully appreciate the fact that we ourselves live on a similar <u><b>target</b></u>, a world subject to catastrophe by random assaults from celestial bodies. That realization was a surprise to many, but it should not have been. One of the great truths revealed by the last few decades of planetary exploration is that collisions between bodies of all sizes are relatively commonplace, at least in geologic terms, and were even more frequent in the early solar system.</p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 22,
                        "soal" => "The passage mentions which of the following with respect to the fragments of comet Shoemaker- Levy 9?",
                        "pilihan" => [
                            "They were once combine in a larger body.",
                            "Some of them burned up before entering earth.",
                            "had observed its breakup into twenty-odd",
                            "They have an unusual orbit. fragments"
                        ],
                        "jawaban" => "They were once combine in a larger body.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 23,
                        "soal" => "The word &quot;collectively&quot; in line 3 is closest in meaning to….",
                        "pilihan" => [
                            "respectively",
                            "popularly",
                            "also",
                            "together"
                        ],
                        "jawaban" => "together"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 24,
                        "soal" => "The author compares the fragments of comet Shoemaker-Levy 9 to all of the following EXCEPT 27. Superheated fireballs were produced as soon as the fragments of comet shoemaker- Levy 9…",
                        "pilihan" => [
                            "a dismembered body",
                            "a train",
                            "a pearl necklace",
                            "a giant planet"
                        ],
                        "jawaban" => "a giant planet"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 25,
                        "soal" => "Before comet Shoemaker-Levy 9 hit Jupiter in July 1994, scientists ...",
                        "pilihan" => [
                            "had been unaware of its existence",
                            "had been tracking it for only a few months",
                            "Some of them are still orbiting Jupiter.",
                            "had decided it would not collide with the planet"
                        ],
                        "jawaban" => "had been tracking it for only a few months",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 26,
                        "soal" => "Before the comet fragments entered the atmosphere of Jupiter, they were most likely…",
                        "pilihan" => [
                            "invisible",
                            "black",
                            "frozen",
                            "exploding"
                        ],
                        "jawaban" => "frozen",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 27,
                        "soal" => "Superheated fireballs were produced as soon as the fragments of comet shoemaker-levy 9…",
                        "pilihan" => [
                            ".hit the surface of  Jupiter",
                            ".were pulled into Jupiter’s orbit tha atmosphere of Jupiter",
                            ".were ejected back throght the tunnel",
                            ".entered the atmosphere of Jupiter"
                        ],
                        "jawaban" => ".entered the atmosphere of Jupiter"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 28,
                        "soal" => "The phrase &quot;incinerated&quot; in paragraph 1 is closest in meaning to…..",
                        "pilihan" => [
                            "burned up",
                            "broke into smaller pieces",
                            "increased its speed",
                            "grew in size"
                        ],
                        "jawaban" => "burned up",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 29,
                        "soal" => "Which of the following is mentioned as evidence of the explosions that is still visible on Jupiter?",
                        "pilihan" => [
                            "fireballs",
                            "ice masses",
                            "black marks",
                            "tunnels"
                        ],
                        "jawaban" => "black marks",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 30,
                        "soal" => "Paragraph 2 discusses the impact of the comet Shoemaker-levy 9 primarily in terms of …..",
                        "pilihan" => [
                            "its importance as an event of-great scientific significance",
                            "its effect on public awareness of the possibility of damage to Earth",
                            "the changes it made to the surface of Jupiter",
                            "the effect it had on television broadcasting"
                        ],
                        "jawaban" => "its effect on public awareness of the possibility of damage to Earth",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 31,
                        "soal" => "The &quot;target&quot; in paragraph 2 most probably referred to",
                        "pilihan" => [
                            "Earth",
                            "Jupiter",
                            "the solar system",
                            "a comet"
                        ],
                        "jawaban" => "Earth",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p><b>Questions 32-42</b></p>
                        <p>The year 1850 may be considered the beginning of a new epoch in America art, with respect to the development of watercolor painting. In December of that year, a group of thirty artists gathered in the studio of John Falconer in New York City and drafted both a constitution and bylaws, establishing The Line Society for the Promotion of Painting in Water Color. In addition to <u><b>securing</b></u> an exhibition space in the Library Society building in lower Manhattan, the society founded a small school for the instruction of watercolor painting Periodic exhibitions of the members' paintings also included works by noted English artists of the day, borrowed from embryonic private collections in the city. </p>
                        <p>The society's activities also included organized sketching excursions along he Hudson River, Its major public exposure came in 1853, when the society presented works by its members in the &quot;Industry of All Nations&quot; section of the Crystal Palace Exposition in New York. The society did not prosper, however, and by the time of its annual meeting in 1854 membership had fallen to twenty-one. The group gave up its quarters in the Library Society building and returned to Falconer's studio, where it broke up amid dissension. No further attempt to formally organize the growing numbers of watercolor painters in New York City was made for more than a decade. During that decade, though, Henry Warren's Painting in Water Color was published in New York City in 1856-the book was a <u><b>considerable</b></u> improvement over the only other manual of instruction existing at the time, Elements of Graphic Art, by Archibald Roberson, published in 1802 and by the 1850's long out of print. </p>
                        <p>In 1866 the National Academy of Design was host to an exhibition of watercolor painting in its elaborate neo-Venetian Gothic building on Twenty-Third Street in New York City. The exhibit was sponsored by an independent group called The Artists Fund Society. Within a few months of this event, forty-two <u><b>prominent</b></u> artists living in and near New York City founded The American Society of Painters in Water colors.</p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 32,
                        "soal" => "This passage is mainly about.",
                        "pilihan" => [
                            "the most influential watercolor painters in the mid-1800's",
                            "efforts to organize watercolor painters in New York City during the mid-1800's",
                            "a famous exhibition of watercolor paintings in New York City in the mid-1800's",
                            "styles of watercolor painting in New York City during the mid-1800's"
                        ],
                        "jawaban" => "efforts to organize watercolor painters in New York City during the mid-1800's",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 33,
                        "soal" => "The year 1850 was significant in the history of watercolor painting mainly because …..",
                        "pilihan" => [
                            "a group of artists established watercolorpainting society",
                            "watercolor painting was first introduced to New York City",
                            "John Falconer established his studio for watercolor painters",
                            "The first book on watercolor painting was published"
                        ],
                        "jawaban" => "a group of artists established watercolorpainting society",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 34,
                        "soal" => "The word &quot;securing&quot; in paragraph 1 is closest in meaning to ...",
                        "pilihan" => [
                            "locking",
                            "creating",
                            "constructing",
                            "acquiring"
                        ],
                        "jawaban" => "acquiring"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 35,
                        "soal" => "All of the following can be inferred about the Society for the promotion of Painting in WaterColor EXCEPT ...",
                        "pilihan" => [
                            "The society exhibited paintings in lower Manhattan.",
                            "Instruction in watercolor painting was offered by members of the society",
                            "The society exhibited only the paintings of its members.",
                            "Scenes of the Hudson River appeared often in the work of society members."
                        ],
                        "jawaban" => "The society exhibited only the paintings of its members.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 36,
                        "soal" => "The exhibition at the Crystal Palace of the works of the Society for the Promotion of Painting in Water Color was significant for which of the following reasons?",
                        "pilihan" => [
                            "It resulted in a dramatic increase in the popularity of painting with watercolor.",
                            "It was the first time an exhibition was funded by a private source.",
                            "It was the first important exhibition of thesociety's work.",
                            "It resulted in a large increase in thenmembership of the society."
                        ],
                        "jawaban" => "It was the first important exhibition of thesociety's work.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 37,
                        "soal" => "The word &quot;it&quot; in paragraph 2 refers to ...",
                        "pilihan" => [
                            "time",
                            "group",
                            "building",
                            "studio"
                        ],
                        "jawaban" => "group",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 38,
                        "soal" => "Which of the following is true of watercolor painters in New York City in the late 1850's?",
                        "pilihan" => [
                            "They increased in number despite a lack of formal organization.",
                            "They were unable to exhibit their paintings because of the lack of exhibition space.",
                            "The Artists Fund Society helped them to form The American Society of Painters in Water Colors.",
                            "They formed a new society because they were not allowed to join groups run by other"
                        ],
                        "jawaban" => "They increased in number despite a lack of formal organization.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 39,
                        "soal" => "Henry Warren's Painting in Water Color was important to artists because it…",
                        "pilihan" => [
                            "received an important reward",
                            "was the only textbook published that taught painting",
                            "was much better than an earlier published",
                            "attracted the interest of art collectors"
                        ],
                        "jawaban" => "was much better than an earlier published",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 40,
                        "soal" => "The word &quot;considerable&quot; in paragraph 2 is closest in meaning to.",
                        "pilihan" => [
                            "sensitive",
                            "great",
                            "thoughtful",
                            "planned"
                        ],
                        "jawaban" => "great",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 41,
                        "soal" => "The year 1866 was significant for watercolor painting for which of the following reasons?",
                        "pilihan" => [
                            "Elements of Graphic Art was republished.",
                            "Private collections of watercolors were first publicly exhibited.",
                            "The neo-Venetian Gothic building on Twenty- Third Street in New York City was built.",
                            "The National Academy of Design held an exhibition of watercolor paintings."
                        ],
                        "jawaban" => "The National Academy of Design held an exhibition of watercolor paintings."
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 42,
                        "soal" => "The word &quot;prominent&quot; in paragraph 3 is closest in painting for which of the following reasons? meaning to ..",
                        "pilihan" => [
                            "wealthy",
                            "local",
                            "famous",
                            "organized"
                        ],
                        "jawaban" => "famous",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p><b>Questions 43-50</b></p>
                        <p>Pennsylvania's colonial ironmasters forged iron and a revolution that had both industrial and political <u><b>implications</b></u>. The colonists in North America wanted the right to the profits gained from their manufacturing. However, England wanted all of the colonies' rich ores and raw materials to feed its own Line factories, and also wanted the colonies to be a market for its finished goods. England passed legislation in 1750 to prohibit colonists from making finished iron products, but by 1771, when entrepreneur Mark Bird established the Hopewell blast furnace in Pennsylvania, iron making had become the backbone of American industry. It also had become one of the major issues that fomented the revolutionary break between England and the British colonies. By the time the War of Independence broke out in 1776, Bird, angered and determined, was manufacturing cannons and shot at Hopewell to be used by the  Continental Army.</p>
                        <p>After the war, Hopewell, along with hundreds of other &quot;iron plantations,&quot; continued to form the new nation's industrial foundation well into the nineteenth century. The rural landscape became dotted with tall stone pyramids that breathed flames and smoke, charcoal-fueled iron furnaces that produced the versatile metal so crucial to the nation's growth,. Generations of ironmasters, craftspeople, and workers produced goods during war and peace-ranging from cannons and shot to domestic items such as cast-iron stoves, pots, and sash weights for windows. </p>
                        <p>The region around Hopewell had everything needed for iron production: a wealth of iron ore near the surface, limestone for removing impurities from the iron, hardwood forests to supply the charcoal used for fuel, <u><b>rushing</b></u> water to power the bellows that pumped blasts of air into the furnace fires, and workers to supply the labor. By the 1830's, Hopewell had developed a reputation for producing high quality cast-iron stoves, for which there was a steady market. As Pennsylvania added more links to its transportation system of <u><b>roads, canals, and railroads</b></u>, it became easier to ship parts made by Hopewell workers to sites all over the east coast. There <u><b>they</b></u> were assembled into stoves and sold from Rhode Island to Maryland as the &quot;Hopewell stove&quot;. By the time the last fires burned out at Hopewell ironworks in 1883, the community had produced <u><b>some</b></u> 80,000 cast-iron stoves.</p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 43,
                        "soal" => "The word &quot;implications&quot; in paragraph 1 is closest in meaning to ..",
                        "pilihan" => [
                            "Significance",
                            "motives",
                            "foundations",
                            "progress"
                        ],
                        "jawaban" => "Significance",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 44,
                        "soal" => "It can be inferred that the purpose of the legislation passed by England in 1750 was to .",
                        "pilihan" => [
                            "reduce the price of English-made iron goods sold in the colonies",
                            "prevent the outbreak of the War of Independence",
                            "require colonists to buy manufactured",
                            "keep the colonies from establishing new markets for their raw materials."
                        ],
                        "jawaban" => "require colonists to buy manufactured",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 45,
                        "soal" => "The author compares iron furnaces to which of the following?",
                        "pilihan" => [
                            "Cannons",
                            "Phyramids",
                            "Pots",
                            "Windows"
                        ],
                        "jawaban" => "Phyramids",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 46,
                        "soal" => "The word &quot;rushing&quot; in paragraph 3 is closest in meaning to…",
                        "pilihan" => [
                            "reliable",
                            "Hopewell",
                            "Appealing",
                            "rapid"
                        ],
                        "jawaban" => "rapid"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 47,
                        "soal" => "Pennsylvania was an ideal location for the Hopewell ironworks for all of the following reasons EXCEPT….",
                        "pilihan" => [
                            "Many workers were available in the area to",
                            "The center of operations of the army was nearby.",
                            "The metal ore was easy to acquire",
                            "There was an abundance of wood"
                        ],
                        "jawaban" => "There was an abundance of wood"
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 48,
                        "soal" => "The word &quot;they&quot; in paragraph 3 refers to…",
                        "pilihan" => [
                            "improvements in transportation benefited the Hopewell ironworks",
                            "iron was used in the construction of various types of transportation",
                            "the transportation system of Pennsylvania was superior to that of other states.",
                            "Hopewell never became a major transportation center"
                        ],
                        "jawaban" => "improvements in transportation benefited the Hopewell ironworks",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 49,
                        "soal" => "The word &quot;they&quot; in paragraph 3 refers to ...",
                        "pilihan" => [
                            "appealing",
                            "links",
                            "rapid",
                            "parts"
                        ],
                        "jawaban" => "links",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 50,
                        "soal" => "The word &quot;some&quot; in paragraph 3  is closest in meaning",
                        "pilihan" => [
                            "only",
                            "a maximum of",
                            "approximately",
                            "a variety of"
                        ],
                        "jawaban" => "approximately",
                    ]
                ],
            ];
        } else if($id == 4){
            $data = [

                [
                    "tipe" => "petunjuk",
                    "data" => "Part A"
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 1,
                        "soal" => "",
                        "pilihan" => [
                            "She wants the man to make a reservation for her.",
                            "They don't need a reservation tonight.",
                            "They should make reservations for next weekend.",
                            "She thinks the restaurant will be crowded tonight.",
                        ],
                        "jawaban" => "They don't need a reservation tonight.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 2,
                        "soal" => "",
                        "pilihan" => [
                            "Get her watch fixed.",
                            "Purchase a watch for the man.",
                            "Cancel the next meeting.",
                            "End the meeting early.",
                        ],
                        "jawaban" => "Get her watch fixed.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 3,
                        "soal" => "",
                        "pilihan" => [
                            "Take the class with a different professor",
                            "Take a class in a different subject.",
                            "Ask the professor if she can take the class.",
                            "Complete the required courses this term.",
                        ],
                        "jawaban" => "Ask the professor if she can take the class.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 4,
                        "soal" => "",
                        "pilihan" => [
                            "He isn't sure who won the game.",
                            "The game won't be played until next week.",
                            "It started raining after the game was over.",
                            "It probably will rain next week.",
                        ],
                        "jawaban" => "The game won't be played until next week.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 5,
                        "soal" => "",
                        "pilihan" => [
                            "The book had been misplaced on the shelf.",
                            "He can probably get a copy of the book for the women",
                            "He will call the warehouse to see if the book is available.",
                            "The woman should check to see if other bookstores have the book.",
                        ],
                        "jawaban" => "He can probably get a copy of the book for the women",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 6,
                        "soal" => "",
                        "pilihan" => [
                            "He used to have problems doing the assignments.",
                            "The woman should become a tutor.",
                            "The woman won't have difficulty in her next class.",
                            "The woman needs help her assignments.",
                        ],
                        "jawaban" => "The woman needs help her assignments.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 7,
                        "soal" => "",
                        "pilihan" => [
                            "Buy the cheaper ice cream.",
                            "Buy the brand of ice cream he usually buys.",
                            "Choose an ice cream that tastes good.",
                            "Get ice cream at a difterent store",
                        ],
                        "jawaban" => "Choose an ice cream that tastes good.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 8,
                        "soal" => "",
                        "pilihan" => [
                            "He didn't enjoy the game because the team lost.",
                            "He's impressed by the efforts of the team.",
                            "The woman is wrong about who won the game. The players could have won if they'd tried harder.",
                            "The players could have won if the’d tried harder",
                        ],
                        "jawaban" => "He's impressed by the efforts of the team.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 9,
                        "soal" => "",
                        "pilihan" => [
                            "The woman already knew about the increase in fees.",
                            "The dorms will be cheaper than off-campus housing.",
                            "The woman thinks the man should move out of the dorm.",
                            "The woman is pleased she won't have to pay the higher fees.",
                        ],
                        "jawaban" => "The woman is pleased she won't have to pay the higher fees.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 10,
                        "soal" => "",
                        "pilihan" => [
                            "He didn't know that David was having a problem.",
                            "The woman doesn't know much about accounting.",
                            "David hasn't started working on his project yet.",
                            "David is going to ask the woman for help.",
                        ],
                        "jawaban" => "David is going to ask the woman for help.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 11,
                        "soal" => "",
                        "pilihan" => [
                            "Invite his family to go to Alaska with him.",
                            "Get advice on how to organize the trip.",
                            "Make a flight reservation as soon as possible.",
                            "Borrow money from his family.",
                        ],
                        "jawaban" => "Borrow money from his family.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 12,
                        "soal" => "",
                        "pilihan" => [
                            "He'd like to go for a walk another time.",
                            "He doesn't want to walk in the rain.",
                            "He's on his way to check out a book.",
                            "He only has time for a short walk.",
                        ],
                        "jawaban" => "He'd like to go for a walk another time.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 13,
                        "soal" => "",
                        "pilihan" => [
                            "She doesn't speak French very well.",
                            "She may be too busy to help.",
                            "She didn't attend the French Club meeting vesterdav.",
                            "She hadn't heard about the activities fair.",
                        ],
                        "jawaban" => "She may be too busy to help.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 14,
                        "soal" => "",
                        "pilihan" => [
                            "She needs to relax.",
                            "The man should try harder to concentrate.",
                            "She has almost finished the reading assignment.",
                            "The music will bother her.",
                        ],
                        "jawaban" => "The music will bother her.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 15,
                        "soal" => "",
                        "pilihan" => [
                            "Speak to his previous employer.",
                            "Get a job working on campus.",
                            "Attend the career services workshop.",
                            "Get a job application form from her.",
                        ],
                        "jawaban" => "Attend the career services workshop.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 16,
                        "soal" => "",
                        "pilihan" => [
                            "She will wash the sweater.",
                            "The sweater has the wrong label.",
                            "The man can get another sweater.",
                            "The manufacturer will repair the sweater.",
                        ],
                        "jawaban" => "The man can get another sweater.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 17,
                        "soal" => "",
                        "pilihan" => [
                            "He's very busy Friday night.",
                            "He hasn't seen his parents for a long time.",
                            "He's sorry that he missed dinner.",
                            "He accepts the woman's invitation.",
                        ],
                        "jawaban" => "He accepts the woman's invitation.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 18,
                        "soal" => "",
                        "pilihan" => [
                            "Discuss her report with the man.",
                            "Give the man her history notes.",
                            "Work on an assignment.",
                            "Answer the man's questions.",
                        ],
                        "jawaban" => "Work on an assignment.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 19,
                        "soal" => "",
                        "pilihan" => [
                            "She's going to spend the whole year in New York.",
                            "She plans to travel somewhere other than New York.",
                            "She decided not to take a vacation this year.",
                            "She won't be able to travel until later in the Vea",
                        ],
                        "jawaban" => "She plans to travel somewhere other than New York.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 20,
                        "soal" => "",
                        "pilihan" => [
                            "She doesn't think that she looks like thestudent.",
                            "Many of her students look alike.",
                            "She isn't related to the student.",
                            "Her daughter isn't in her class.",
                        ],
                        "jawaban" => "She isn't related to the student.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 21,
                        "soal" => "",
                        "pilihan" => [
                            "The woman will probably not be able to get the call she's waiting for.",
                            "The woman's phone call isn't important.",
                            "He'll call the phone company for the woman.",
                            "He'll try to repair the &quot;woman's phone.",
                        ],
                        "jawaban" => "The woman will probably not be able to get the call she's waiting for.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 22,
                        "soal" => "",
                        "pilihan" => [
                            "He also plans to drop a class.",
                            "He also waited in line for a long time today.",
                            "He doesn't know where to go to drop a class.",
                            "He missed the deadline for dropping a class.",
                        ],
                        "jawaban" => "He also plans to drop a class.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 23,
                        "soal" => "",
                        "pilihan" => [
                            "The man should use a new printer.",
                            "The man's primer isn't set up correctly.",
                            "There is nothing wrong with the man's printer.",
                            "She can't help the man right away.",
                        ],
                        "jawaban" => "She can't help the man right away.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 24,
                        "soal" => "",
                        "pilihan" => [
                            " The woman should wear his scarf to the game.",
                            "It will be cold at the game.",
                            "The woman should borrow another sweater.",
                            "He'll go home and get another scarf.",
                        ],
                        "jawaban" => " The woman should wear his scarf to the game.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 25,
                        "soal" => "",
                        "pilihan" => [
                            "She understands why the man seems unhappy.",
                            "She will help the man change his diet.",
                            "The man should see a doctor.",
                            "The doctor has already explained the problem to her.",
                        ],
                        "jawaban" => "She understands why the man seems unhappy.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 26,
                        "soal" => "",
                        "pilihan" => [
                            "The number of people who voted was very lOW.",
                            "The vote was very close.",
                            "Congressman Baker didn't run for office.",
                            "She was not pleased with the results.",
                        ],
                        "jawaban" => "The vote was very close.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 27,
                        "soal" => "",
                        "pilihan" => [
                            "He's sorry that the woman didn't like the book.",
                            "He can order the math book for the woman.",
                            "It's too late for the woman to get a refund.",
                            "The woman bought the book less than ten days ago.",
                        ],
                        "jawaban" => "It's too late for the woman to get a refund.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 28,
                        "soal" => "",
                        "pilihan" => [
                            "He was deased with the art in the collection.",
                            "He prefers small art exhibits to large ones.",
                            "He hasn't visited the art gallery yet.",
                            "He doesn't enjoy going to art galleries.",
                        ],
                        "jawaban" => "He was deased with the art in the collection.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 29,
                        "soal" => "",
                        "pilihan" => [
                            "He’d like to invite the woman for lunch",
                            "He did’t expect to join the woman for lunch",
                            "He can help the woman solve the math problem.",
                            "He wants to postpone his lunch meeting with the woman",
                        ],
                        "jawaban" => "He did’t expect to join the woman for lunch",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 30,
                        "soal" => "",
                        "pilihan" => [
                            "Vote for the man.",
                            "Read the man's speech.",
                            "Introduce the man to the class president.",
                            "Tell her friends to vote in the election.",
                        ],
                        "jawaban" => "Read the man's speech.",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        PART B
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 31,
                        "soal" => "",
                        "pilihan" => [
                            "The early history of bookbinding.",
                            "How old books become valuable.",
                            "Economical ways to protect old books.",
                            "Why some books deteriorate.",
                        ],
                        "jawaban" => "Why some books deteriorate.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 32,
                        "soal" => "",
                        "pilihan" => [
                            "They are often handled improperly by readers.",
                            "The paper is destroyed by chemicals.",
                            "The ink used in printing damages the paper.",
                            "The glue used in the binding loses its strenght",
                        ],
                        "jawaban" => "The paper is destroyed by chemicals.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 33,
                        "soal" => "",
                        "pilihan" => [
                            "They are difficult to read.",
                            "They are slowly falling apart.",
                            "They were not made from wood pulp.",
                            "They should be stored in a cold place.",
                        ],
                        "jawaban" => "They were not made from wood pulp.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 34,
                        "soal" => "",
                        "pilihan" => [
                            "It's very expensive.",
                            "It hasn't proven to be totally effective.",
                            "It can be damaging to some books.",
                            "It can't be used on books published before 1850.",
                        ],
                        "jawaban" => "It's very expensive.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 35,
                        "soal" => "",
                        "pilihan" => [
                            "Get some books for the man to look at.",
                            "Ask the man to look over her notes.",
                            "Continue her research in the library.",
                            "Find more information on how books are preserved.",
                        ],
                        "jawaban" => "Continue her research in the library.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 36,
                        "soal" => "",
                        "pilihan" => [
                            "To plan an exhibit of the student's artwork.",
                            "To discuss different whaling techniques",
                            "To prepare for a visit to a museum",
                            "To review information for examination",
                        ],
                        "jawaban" => "To prepare for a visit to a museum",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 37,
                        "soal" => "",
                        "pilihan" => [
                            "Iron from old ships.",
                            "Wood found floating in the ocean. strength,",
                            "Seashells of unusual shapes and colors.",
                            "The bones and teeth of whales",
                        ],
                        "jawaban" => "The bones and teeth of whales",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 38,
                        "soal" => "",
                        "pilihan" => [
                            "To occupy their free time.",
                            "To bring good luck.",
                            "To earn extra money.",
                            "To take part in art competitions",
                        ],
                        "jawaban" => "To occupy their free time.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 39,
                        "soal" => "",
                        "pilihan" => [
                            "They were used in the home.",
                            "They were used to decorate the ship.",
                            "They were used to catch whales.",
                            "They were sold to art dealers.",
                        ],
                        "jawaban" => "They were used in the home.",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        Part C
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 40,
                        "soal" => "",
                        "pilihan" => [
                            "The importance of anthropology to modern society",
                            "A good source of information about a society",
                            "Attitudes toward culture in the 1940's.",
                            "The relationship between anthropology and the military.",
                        ],
                        "jawaban" => "The importance of anthropology to modern society",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 41,
                        "soal" => "",
                        "pilihan" => [
                            "Students might not consider them to be an important part of culture.",
                            "They symbolize the rebellion of youth in the 1950's.",
                            "They are discussed in the student's textbook.",
                            "They have been worn for hundreds of years.",
                        ],
                        "jawaban" => "Students might not consider them to be an important part of culture.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 42,
                        "soal" => "",
                        "pilihan" => [
                            "To show how politics have changed over the years.",
                            "To point out that T-shirts often provide personal information.",
                            "To illustrate how the printing on clothing has improved.",
                            "To support that T-shirts are a form of art.",
                        ],
                        "jawaban" => "To point out that T-shirts often provide personal information.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 43,
                        "soal" => "",
                        "pilihan" => [
                            "Places where T-shirts are not acceptable.",
                            "Images that are currently printed on T-shirts.",
                            "Names of people who have made T-shirts popular.",
                            "Ways that T-shirts represent American culture.",
                        ],
                        "jawaban" => "Ways that T-shirts represent American culture.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 44,
                        "soal" => "",
                        "pilihan" => [
                            "Successful business practices.",
                            "Famous inventors.",
                            "Public health concerns.",
                            "Unsuccessful inventions.",
                        ],
                        "jawaban" => "Successful business practices.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 45,
                        "soal" => "",
                        "pilihan" => [
                            "They drank from public water fountains.",
                            "They passed around a cup of water.",
                            "They drank from personal tin cups that they carried with them.",
                            "They bought a paper cup of water.",
                        ],
                        "jawaban" => "They passed around a cup of water.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 46,
                        "soal" => "",
                        "pilihan" => [
                            "To demonstrate the importance of public society, health laws.",
                            "To point out that without luck businesses will society. not succeed.",
                            "To explain how traveling led to new inventions.",
                            "To illustrate the importance of having the right product at the right time.",
                        ],
                        "jawaban" => "To illustrate the importance of having the right product at the right time.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 47,
                        "soal" => "",
                        "pilihan" => [
                            "How grasshoppers find food.",
                            "How grasshoppers fight other insects.",
                            "How grasshoppers communicate with each other.",
                            "How grasshoppers escape from danger.",
                        ],
                        "jawaban" => "How grasshoppers escape from danger.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 48,
                        "soal" => "",
                        "pilihan" => [
                            "To correct a common misunderstanding about grasshoppers.",
                            "To help explain how well grasshoppers can jump.",
                            "To compare the size of grasshopper with that or other insect.",
                            "To show how quickly grasshoppers respond to danger.",
                        ],
                        "jawaban" => "To help explain how well grasshoppers can jump.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 49,
                        "soal" => "",
                        "pilihan" => [
                            "They detect nerve impulses transmitted to agrasshopper's legs.",
                            "Thev sense how far a grasshopper has jumped.",
                            "They detect changes in air pressure.",
                            "They help a grasshopper find food.",
                        ],
                        "jawaban" => "They detect changes in air pressure.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 50,
                        "soal" => "",
                        "pilihan" => [
                            "The number of impulses transmitted to the grasshopper's legs.",
                            "The age of the grasshopper.",
                            "The number of sensory organs grasshopper has.",
                            "The size of the nerves that control walking",
                        ],
                        "jawaban" => "The number of impulses transmitted to the grasshopper's legs.",
                    ]
                ],
            ];
        } else if($id == 5){
            $data = [

                [
                    "tipe" => "petunjuk",
                    "data" => "
                        Structure
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 1,
                        "soal" => "Before 8000 B. C. Wheat did not grow as prolifically ... It does todav",
                        "pilihan" => [
                            "like",
                            "as",
                            "for",
                            "than",
                        ],
                        "jawaban" => "as",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 2,
                        "soal" => "Both nickel and iron are whitish metals….",
                        "pilihan" => [
                            "that are attracted by magnets",
                            "that magnets are attracted by them",
                            "are attracted by magnets",
                            "magnets that attract them",
                        ],
                        "jawaban" => "that are attracted by magnets",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 3,
                        "soal" => "The bark of some species of oak trees yields a substance used in ... leather.",
                        "pilihan" => [
                            "Treating",
                            "to treat",
                            "its treatment",
                            "it treats",
                        ],
                        "jawaban" => "Treating",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 4,
                        "soal" => "Although phosphorus is an essential constituent of all living creatures,….. is among the least abundant of the mineral nutrients.",
                        "pilihan" => [
                            "What",
                            "it",
                            "Still",
                            "however",
                        ],
                        "jawaban" => "it",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 5,
                        "soal" => "... angles of any triangle always add up to 180 degrees.",
                        "pilihan" => [
                            "If three",
                            "The three",
                            "Three of",
                            "Three are",
                        ],
                        "jawaban" => "The three",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 6,
                        "soal" => "The gibbon ranges over….. other apes do.",
                        "pilihan" => [
                            "than an area wider",
                            "wider than the area",
                            "a wider area than",
                            "an area wider than are",
                        ],
                        "jawaban" => "a wider area than",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 7,
                        "soal" => "Sarah Frances Whiting opened the …. of physics in the United States in 1878.",
                        "pilihan" => [
                            "undergraduate teaching was in a second laboratory",
                            "second undergraduate teaching laboratory",
                            "undergraduate teaching laboratory was second",
                            "second undergraduate teaching laboratory",
                        ],
                        "jawaban" => "undergraduate teaching laboratory was second",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 8,
                        "soal" => "... some of the Earth's interior heat escapes to the surface.",
                        "pilihan" => [
                            "A volcano erupts",
                            "A volcano whether erupts",
                            "A volcano erupts it",
                            "If a volcano erupts",
                        ],
                        "jawaban" => "If a volcano erupts",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 9,
                        "soal" => "Sandra Day O'Connor, the first woman member of the United States Supreme Court, believed that the courts should interpret the laws…. legislate.",
                        "pilihan" => [
                            "than attempt to rather",
                            "rather than attempt to",
                            "to attempt rather than",
                            "attempt rather than to",
                        ],
                        "jawaban" => "rather than attempt to",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 10,
                        "soal" => "... of minerals, which are chemical elements or compounds of varying purity.",
                        "pilihan" => [
                            "The consistency of rocks",
                            "Rocks, consisting",
                            "Rocks consist",
                            "Whereas rocks consist",
                        ],
                        "jawaban" => "Rocks consist",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 11,
                        "soal" => "Booker T. Washington, acclaimed as a leading educator at the turn of the century, ... of a school that later became the Tuskegee Institute.",
                        "pilihan" => [
                            "taking charge",
                            "took charge",
                            "charges was taken",
                            "taken charge",
                        ],
                        "jawaban" => "took charge",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 12,
                        "soal" => "... White ginger, one scrapes and washes the roots before drying them.",
                        "pilihan" => [
                            "If makes",
                            "When making",
                            "Made",
                            "The making of",
                        ],
                        "jawaban" => "When making",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 13,
                        "soal" => "By the time ..., Norman Rockwell had decided that he wanted to be an artist.",
                        "pilihan" => [
                            "in his early teens",
                            "his early teens were",
                            "was his early teens",
                            "he was in his early teens",
                        ],
                        "jawaban" => "he was in his early teens",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 14,
                        "soal" => "During the eighteenth century, Little Turtle was chief of the Miami tribe whose territory became ... is now Indiana and Ohio. All makes",
                        "pilihan" => [
                            "to require",
                            "they require",
                            "required",
                            "requiring",
                        ],
                        "jawaban" => "requiring",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 15,
                        "soal" => "Pansies can be cultivated easily in home gardens, but ….. plenty of water and not too much sun.",
                        "pilihan" => [
                            "to require",
                            "they require",
                            "required",
                            "requiring",
                        ],
                        "jawaban" => "they require",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 16,
                        "soal" => "<u>For make</u> adobe bricks, <u>workers</u> mix sand and day or mud with water and small <u>quantities</u> of straw, grass, or a <u>similar</u> material.",
                        "pilihan" => [
                            "For make",
                            "workers",
                            "quantities",
                            "similar",
                        ],
                        "jawaban" => "workers",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 17,
                        "soal" => "A dictionary allows <u>quick</u> access to the </u>meaning</u> of a word </u>only</u> if one knows </u>how spell</u> the word.",
                        "pilihan" => [
                            "quick",
                            "meaning",
                            "only",
                            "how spell",
                        ],
                        "jawaban" => "quick",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 18,
                        "soal" => "</u>To</u> simulate natural sounds in music, composers often use the orchestral instrument </u>that</u> they feel </u>most near</u> approximates the sound </u>in question</u>.",
                        "pilihan" => [
                            "To",
                            "that",
                            "most near",
                            "in question",
                        ],
                        "jawaban" => "most near",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 19,
                        "soal" => "Sodium is </u>of one</u> the few metals </u>that</u> will </u>burn when</u> heated </u>in air</u>.",
                        "pilihan" => [
                            "of one",
                            "that",
                            "burn when",
                            "in air",
                        ],
                        "jawaban" => "of one",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 20,
                        "soal" => "</u>Alike</u> traditional harmony, jazz progressions are </u>based</u> on triads, </u>but</u> the special jazz sound is </u>created</u> by the piling up of thirds above a basic triad.",
                        "pilihan" => [
                            "Alike",
                            "based",
                            "but",
                            "created",
                        ],
                        "jawaban" => "Alike",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 21,
                        "soal" => "Maine's abundant </u>forests</u> and rivers </u>has made</u> it a haven </u>for</u> many </u>kinds of</u> wildlife.",
                        "pilihan" => [
                            "forests",
                            "has made",
                            "for",
                            "kinds of",
                        ],
                        "jawaban" => "has made",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 22,
                        "soal" => "</u>In feudal</u> times, the rank of knighthood carried </u>no social</u> distinction, </u>neither</u> any man </u>could</u> be a night.",
                        "pilihan" => [
                            "In feudal",
                            "no social",
                            "neither",
                            "could",
                        ],
                        "jawaban" => "neither",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 23,
                        "soal" => "Ethel Harvey's career illustrates </u>some</u> of the challenges encountered by women </u>scientists</u> of her generation </u>as they sought</u> support for </u>they</u> work.",
                        "pilihan" => [
                            "some",
                            "scientists",
                            "as they sought",
                            "they",
                        ],
                        "jawaban" => "they",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 24,
                        "soal" => "</u>Before</u> the plains were settled, prairle dog towns in many places </u>stretch</u> </u>as far as</u> the eye </u>could</u> see.",
                        "pilihan" => [
                            "Before",
                            "stretch",
                            "as far as",
                            "could",
                        ],
                        "jawaban" => "stretch",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 25,
                        "soal" => "Direct mail advertising serves </u>to acquaint</u> customers with products, alert </u>them</u> to new opportunities, and </u>paving</u> the way for </u>other sales</u> activities.",
                        "pilihan" => [
                            "to acquaint",
                            "them",
                            "paving",
                            "other sales",
                        ],
                        "jawaban" => "paving",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 26,
                        "soal" => "</u>Animal life</u> on Prince Edward Island </u>is</u> confined </u>large</u> to ducks, pheasants, and </u>rabbits</u>.",
                        "pilihan" => [
                            "Animal life",
                            "is",
                            "large",
                            "rabbits",
                        ],
                        "jawaban" => "large",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 27,
                        "soal" => "Andrew Wyeth is </u>famous for</u> his realistic and </u>thoughtful</u> paintings </u>of person</u> and places in </u>rural</u> Pennsylvania and Maine.",
                        "pilihan" => [
                            "famous for",
                            "thoughtful",
                            "of person",
                            "rural",
                        ],
                        "jawaban" => "of person",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 28,
                        "soal" => "</u>It is</u> common </u>knowledge</u> that </u>a flash</u> of lightning is seen before a clap of </u>thunder heard</u>.",
                        "pilihan" => [
                        "It is",
                        "knowledge",
                        "a flash",
                        "thunder heard",
                    ],
                    "jawaban" => "thunder heard",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 29,
                        "soal" => "Wild elephants are </u>almost</u> continuously waving their </u>trunks</u>, both </u>up</u> in the air and down </u>aside</u> the ground.",
                        "pilihan" => [
                        "almost",
                        "trunks",
                        "up",
                        "aside",
                    ],
                    "jawaban" => "aside",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 30,
                        "soal" => "Oriental rugs are considered </u>yaluable</u> and because their </u>designs</u> are </u>intricate</u> and the </u>weaving</u> process is time-consuming.",
                        "pilihan" => [
                        "yaluable",
                        "designs",
                        "intricate",
                        "weaving",
                    ],
                    "jawaban" => "yaluable",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 31,
                        "soal" => "The Montreal International Exposition, &quot;Expo 67,&quot; </u>was applauded</u> for displaying </u>an degree</u> of taste </u>superior</u> to that </u>of</u> similar expositions.",
                        "pilihan" => [
                        "was applauded",
                        "an degree",
                        "superior",
                        "of",
                    ],
                    "jawaban" => "an degree",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 32,
                        "soal" => "A motion picture </u>director</u> for over twenty years, Lois Weber stamped her films </u>with</u> </u>herself</u> style and </u>personal</u> conviction.",
                        "pilihan" => [
                        "director",
                        "with",
                        "herself",
                        "personal",
                    ],
                    "jawaban" => "herself",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 33,
                        "soal" => "According to astronomers, the </u>type cloud</u> found </u>most frequently</u> in outer space consist of diffuse particles </u>of dust</u> and </u>gas</u>.",
                        "pilihan" => [
                        "type cloud",
                        "most frequently",
                        "of dust",
                        "gas",
                    ],
                    "jawaban" => "type cloud",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 34,
                        "soal" => "Among </u>almost</u> seven hundred species of bamboo, some are </u>fully</u> grown at less than a foot high, while </u>other</u> can grow three </u>feet</u> in twenty-four hours.",
                        "pilihan" => [
                        "almost",
                        "fully",
                        "other",
                        "feet",
                    ],
                    "jawaban" => "other",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 35,
                        "soal" => "A foreign exchange rate is </u>a price</u> that </u>reflects</u> the relative supply </u>and demand</u> of </u>difference</u> currencies.",
                        "pilihan" => [
                        "a price",
                        "reflects",
                        "and demand",
                        "difference",
                    ],
                    "jawaban" => "difference",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 36,
                        "soal" => "Recent studies have shown that air </u>into</u> a house </u>often</u> has higher concentrations of contaminants than </u>heavily</u> polluted </u>air outside</u>.",
                        "pilihan" => [
                        "into",
                        "often",
                        "heavily",
                        "air outside",
                    ],
                    "jawaban" => "into",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 37,
                        "soal" => "Rock decay or </u>weathering</u> is the </u>results</u> of reactions between </u>elements</u> in the </u>atmosphere</u> and the rock's constituents.",
                        "pilihan" => [
                        "weathering",
                        "results",
                        "elements",
                        "atmosphere",
                    ],
                    "jawaban" => "weathering",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 38,
                        "soal" => "</u>The phases</u> of the Moon have </u>served</u> as primary </u>divisions</u> of time for thousands of </u>years ago</u>.",
                        "pilihan" => [
                        "The phases",
                        "served",
                        "divisions",
                        "years ago",
                    ],
                    "jawaban" => "divisions",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 39,
                        "soal" => "The </u>introduction</u> of the power loom </u>enabled</u> weavers to </u>produce</u> yard goods faster more efficiently, and </u>less expensive</u>.",
                        "pilihan" => [
                        "introduction",
                        "enabled",
                        "produce",
                        "less expensive",
                    ],
                    "jawaban" => "enabled",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 40,
                        "soal" => "</u>In</u> the 1880's, </u>when</u> George Eastman first </u>offered</u> the Kodak camera and film, photography </u>becoming</u> a popular and individualized art.",
                        "pilihan" => [
                        "In",
                        "when",
                        "offered",
                        "becoming",
                    ],
                    "jawaban" => "when",
                    ]
                ],
            ];
        } else if($id == 6){
            $data = [

                [
                    "tipe" => "petunjuk",
                    "data" => "Reading"
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p>Questions 1-5</p>
                        <p>People living today in the northwestern state of Washington who have many sources of news in addition to newspapers must stretch their imaginations to understand the importance of the press during much of the state's history. Beginning in 1852 with The Cohumblan. the first paper in Washington Line Territory, ,lewspapers served to connect settlers in frontier communities with each other and with the major events of their times.</p>
                        <p>Unlike many mid-century papers, The Columbian, published every Saturday in Olympia, one of Washington's larger towns, was &quot;neutral in politics,&quot; meaning that <b>it</b> was not the organ of a particular political party or religious group. For its first few years, it was the only newspaper in the territory, but during the following decades, enterprising Washingtonians founded many other papers. Few of these papers lasted long. Until the turn of the century, most were the production of an individual editor, who might begin with insufficient capital or fail to attract a steady readership. Often working with no staff at all, these editors wrote copy, set type, <b>delivered</b> papers <b>oversaw</b>, billing, and sold advertising. Their highly personal journals reflected their own tastes, politics, and known as the &quot;Oregon style&quot;-graphic, torrid, and potentially libelous. </p>
                        <p>Early newspapers were thick with print, carrying no illustrations or cartoons. Advertising was generally confined to the back pages and simply listed commodities received by local stores, Toward the end of the century, newspapers in Washington began to carry national advertising, especially from patent medicine companies, which bought space from agencies that brokered ads in papers all over the country. By 1900, Washington <b>boasted</b> 19 daily and 176 weekly papers. Especially in the larger cities, they reflected less the personal opinions of the editor than the interests of the large businesses they had become. They subscribed to the Associated Press and United Press news services, and new technology permitted illustrations. Concentrating on features, crime reporting, and sensationalism, they imitated the new mass-circulation papers that William Randolph Hearst and Joseph Pulitzer were making popular throughout the United States.</p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 1,
                        "soal" => "What does the passage mainly discuss?",
                        "pilihan" => [
                        "Ways in which various newspapers were advertised in Washington",
                        "The history of newspapers in Washington",
                        "Editors of the first Washington newspapers",
                        "The illustrations in early Washington newspapers",
                    ],
                    "jawaban" => "The history of newspapers in Washington",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 2,
                        "soal" => "What does the passage imply about early Washington newspapers?",
                        "pilihan" => [
                        "People relied on them as their primary source of news.",
                        "They contained important historical articles.",
                        "They were not as informative as today's newspapers.",
                        "They rarely reflected the views of any particular religion,",
                    ],
                    "jawaban" => "They were not as informative as today's newspapers.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 3,
                        "soal" => "In paragraph 2, the word &quot;it&quot; refers to ...",
                        "pilihan" => [
                        "The Columbian",
                        "Olympia",
                        "religious group",
                        "political party",
                    ],
                    "jawaban" => "The Columbian",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 4,
                        "soal" => "In paragraph 2, the word &quot;oversaw&quot; is closest in meaning to….",
                        "pilihan" => [
                        "estimated",
                        "supervised",
                        "collected",
                        "provided",
                    ],
                    "jawaban" => "estimated",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 5,
                        "soal" => "paragraph 2, the word &quot;delivered&quot; is closest in meaning to",
                        "pilihan" => [
                        "confirmed",
                        "compared",
                        "questioned",
                        "presented",
                    ],
                    "jawaban" => "presented",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 6,
                        "soal" => "According to the passage, which of the following was true of curly Washington newspapers?",
                        "pilihan" => [
                        "Most were owned by part-time editors who newspapers of the mid-nineteenth century? worked at other jobs.",
                        "Most were run by editors who had little or no earlier newspaper experience.",
                        "Most received financial support from the town in which they were published.",
                        "Most stayed in business for only a short while.",
                    ],
                    "jawaban" => "Most stayed in business for only a short while.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 7,
                        "soal" => "What does the author mention as typical of early",
                        "pilihan" => [
                        "Their capital grew rapidly.",
                        "Their political opinions changed with time.",
                        "They had many types of responsibilities.",
                        "They were generally members of the same political party.",
                    ],
                    "jawaban" => "They had many types of responsibilities.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 8,
                        "soal" => "Which of the following can be inferred from was true of curly Washington newspapers? the passage about advertising in Washington newspaper editors from Washington?",
                        "pilihan" => [
                        "It contained information about patentmedicines.",
                        "It focused on local rather than national products.",
                        "It was printed on entire pages distributed in local stores.",
                        "It was the only part of the paper containing cartoons.",
                    ],
                    "jawaban" => "It focused on local rather than national products.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 9,
                        "soal" => "paragraph 3, the word &quot;boasted&quot; is closest I meaning to …..",
                        "pilihan" => [
                        "planned",
                        "financed",
                        "was forced to close",
                        "took pride in having",
                    ],
                    "jawaban" => "financed",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p>Questions 10-16</p>
                        <p>Europa is the smallest of planet Jupiter's four largest moons and the second moon out from Jupiter. Until 1979, it was just another astronomy textbook statistic. Then came the close-up images obtained by the exploratory spacecraft Voyager 2, and within days, Europa was transformed-in our perception, Line at least-into one of the solar system's most <b>intriguing</b> worlds. The biggest initial surprise was the ahnost total lack of detail, especially from far away. Even at close range, the only visible features are thin, kinked brown lines resembling <b>cracks in an eggshell</b>. And <b>this analogy is not far offthe mark</b>.</p>
                        <p>The surface of Europa is almost pure water ice, but a nearly complete absence of craters indicates that Europa's surface ice resembles Earth's Antarctic ice cap. The eggshell analogy may be quite accurate since the ice could be as little as a few kilometers thick a tree shell around what is likely a subsurface liquid ocean that, in turn, encases a rocky core. The interior of Europa has been kept warm over the cons by tidal forces generated by the varying gravitational tugs of the other big moons as they wheel around Jupiter. The tides on Europa pull and relax in an <b>endless</b> cycle. The resulting internal heat keeps what would otherwise be ice melted almost to the surface. The cracklike marks on Europa's icy face appear to be fractures where water or slush oozes from below. </p>
                        <p>Soon after Voyager 2's encounter with Jupiter in 1979, when the best images of Europa were obtained, researchers advanced the startling idea that Europa's subsurface ocean might harbor life. Life processes could have begun when Jupiter was releasing a vast store of internal heat. Jupiter's early heat was produced by the compression of the material forming the giant planet. Just as the Sun is far less radiant today than the primal Sun, so the internal heat generated by Jupiter is minor compared to its former intensity. During this warm phase, some 4.6 billion years ago, Europa's ocean may have been liquid right to the surface, making <b>it</b> a crucible for life.</p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 10,
                        "soal" => "What does the passage mainly discuss?",
                        "pilihan" => [
                        "The effect of the tides on Europa's interior",
                        "Temperature variations on Jupiter's moons",
                        "Discoveries leading to a theory about one of Jupiter's moons",
                        "Techniques used by Voyager 2 to obtain close-up images",
                    ],
                    "jawaban" => "Techniques used by Voyager 2 to obtain close-up images",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 11,
                        "soal" => "The word &quot;intriguing&quot; in paragraph 1 is closest in meanine to",
                        "pilihan" => [
                        "changing",
                        "perfect",
                        "visible",
                        "fascinating",
                    ],
                    "jawaban" => "changing",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 12,
                        "soal" => "In paragraph 1, the author mentions &quot;cracks in an eggshell&quot; in order to help readers..",
                        "pilihan" => [
                        "visualize Europa as scientists saw it in the Voyager 2 images",
                        "appreciate the extensive and detailed informalion available by viewing Europa from far away",
                        "understand the relationship of Europa to the  solar system",
                        "recognize the similarity of Europa to Jupiter's other moons",
                    ],
                    "jawaban" => "visualize Europa as scientists saw it in the Voyager 2 images",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 13,
                        "soal" => "It can be inferred from the passage that astronomy textbooks prior to 1979 ..",
                        "pilihan" => [
                        "provided many contradictory statistics about",
                        "considered Europa the most important of Jupiter's moons",
                        "did not emphasize Europa because little information of interest was available",
                        "did not mention Europa because it had not yet been discovered",
                    ],
                    "jawaban" => "provided many contradictory statistics about",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 14,
                        "soal" => "What does the author mean by stating in paragraph 1 that &quot;this analogy is not far off the mark&quot;?",
                        "pilihan" => [
                        "The definition is not precise.",
                        "The discussion lacks necessary information",
                        "The differences are probably significant.",
                        "The comparison is quite appropriate.",
                    ],
                    "jawaban" => "The comparison is quite appropriate.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 15,
                        "soal" => "It can be inferred from the passage that Europa and Antarctica have in common which of the following?",
                        "pilihan" => [
                        "Both appear to have a surface with many craters.",
                        "Both may have water beneath a thin, hard surface.",
                        "Both have an ice cap that is melting rapidly.",
                        "Both have areas encased by a rocky exterior.",
                    ],
                    "jawaban" => "Both have an ice cap that is melting rapidly.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 16,
                        "soal" => "The word &quot;endless&quot; in paragraph 2 is closest in meaning To….",
                        "pilihan" => [
                        "new",
                        "final",
                        "temporary",
                        "continuous",
                    ],
                    "jawaban" => "continuous",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 17,
                        "soal" => "According to the passage, what is the effect of Jupiter's other large moons on Eurnpa?",
                        "pilihan" => [
                        "They prevent Europa's subsurface waters from freezing.",
                        "They prevent tides that could damage Europa's surface.",
                        "They produce the very hard layer of ice that characterizes Europa.",
                        "They assure that the gravitational pull on Europa is maintained at a steady level.",
                    ],
                    "jawaban" => "They prevent Europa's subsurface waters from freezing.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 18,
                        "soal" => "According to the passage, Voyager 2's images led researchers to develop which of the following theories'?",
                        "pilihan" => [
                        "Jupiter may be hotter today than it once",
                        "Europa is far older than scientists originally thought",
                        "Europa's temperature is maintained by Jupiter's vast store of internal heat.",
                        "The ocean waters of Europa could contain some forms of life.",
                    ],
                    "jawaban" => "The ocean waters of Europa could contain some forms of life.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 19,
                        "soal" => "The word &quot;it&quot; in paragraph 3 refers to ...",
                        "pilihan" => [
                        "internal heat",
                        "warm phase",
                        "Europa's ocean",
                        "surface",
                    ],
                    "jawaban" => "Europa's ocean",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p>Questions 20-26</p>
                        <p>The term &quot;print&quot; has several meanings, so it is important to understand exactly what is meant by the artistic terminology. A print in the artistic sense is not a reproduction of a work of art done in some other medium, such as painting or drawing. <b>That</b> can in no sense be considered a work of art, since Line the artist had no involvement with it. A print is an original work of art created by an indirect method. Instead of making an image directly on a surface, as in drawing or painting, the artist works on a master surface, which may be a sheet of metal, a block of stone, wood, plastic, or linoleum. From this master surface, numerous <b>impressions</b> may be made by inking the surface, laying a sheet of paper on it, and then subjecting both surface and paper to pressure, generally by means of a printing press. </p>
                        <p>A print may exist in several <b>versions</b>. Sometimes the printmaker alters the image between impressions, so that each print is slightly different from the others. Any series of such prints is referred to as <b>multiples</b>. The number of impressions (known as the edition) that are possible from a single original varies with the material. Prints made from linoleum, which wears readily, will be fewer than those made from a metal plate, which is capable of striking fine-quality prints in the thousands. <b>It is customary</b> to number prints as they come off the press, the earlier impressions being the finest and therefore the most desirable. </p>
                        <p>Prints incorporate the same compositional principles, as paintings. Line, shape, or texture maybe the predominant element according to the printing technique used. Some prints have obvious decorative qualities while others may be filled with emotional impact. Printmaking derives from two historical sources: early woodblocks into which an image was cut and used to illustrate a book or playing cards, and the medieval practice of decorating metal with incised designs, as in armor. Today most techniques fall into one of four categories: relief( intaglio, lithography, and serigraphy. However, there are many variations, combinations with photographic techniques, and considerable overlapping.</p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 20,
                        "soal" => "In the artistic sense, a print is a work of art created by…..",
                        "pilihan" => [
                        "making a painting from an original drawing",
                        "drawing or painting similar images many times",
                        "transferring an original image from one surface to another",
                        "Copying an original image made on paper onto a hard surface",
                    ],
                    "jawaban" => "transferring an original image from one surface to another",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 21,
                        "soal" => "The word &quot;That&quot; in paragraph 1 refers to .",
                        "pilihan" => [
                        "terminolory",
                        "sense",
                        "reproduction",
                        "medium",
                    ],
                    "jawaban" => "reproduction",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 22,
                        "soal" => "Which of the following is mentioned as example of a master surface?",
                        "pilihan" => [
                        "A drawing or painting",
                        "A block of stone",
                        "A sheet of paper",
                        "A printing press",
                    ],
                    "jawaban" => "A block of stone",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 23,
                        "soal" => "The word &quot;versions&quot; in paragraph 2 is closcst in meaning to..",
                        "pilihan" => [
                        "ideas",
                        "numbers",
                        "functions",
                        "forms",
                    ],
                    "jawaban" => "forms",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 24,
                        "soal" => "Which of the following terms is NOT defined in the passage?",
                        "pilihan" => [
                        "&quot;print&quot; (paragraph 2)",
                        "&quot;impressions&quot; (paragraph 2)",
                        "&quot;multiples&quot; (paragraph 2)",
                        "&quot;edition&quot; (paragraph 2)",
                    ],
                    "jawaban" => "&quot;multiples&quot; (paragraph 2)",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 25,
                        "soal" => "A metal plate is compared favorably with linoleum as a meter surface because a metal plate...",
                        "pilihan" => [
                        "Last longer",
                        "Is less expensive",
                        "Makes print more quicly",
                        "Produces a greater variety of prints",
                    ],
                    "jawaban" => "Last longer",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 26,
                        "soal" => "The word &quot;customary&quot; in paragraph 2 is closest in meaning to.",
                        "pilihan" => [
                        "necessary",
                        "attractive",
                        "legal",
                        "usual",
                    ],
                    "jawaban" => "attractive",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 27,
                        "soal" => "The phrase &quot;according to&quot; in paragraph 3 is closest in meaning to ...",
                        "pilihan" => [
                        "in addition to",
                        "in order to",
                        "regardless of",
                        "depending on",
                    ],
                    "jawaban" => "depending on",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 28,
                        "soal" => "It can be inferred that prints may differ from other works of art in terms of all of the following EXCEPT...",
                        "pilihan" => [
                        "compositional principles",
                        "use of line, shape, or texture",
                        "decorative qualities",
                        "emotional impact",
                    ],
                    "jawaban" => "use of line, shape, or texture",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p>Questions 29-38</p>
                        <p>Water projects in the United States gained a new rationale in the 1930's as the nation suffered its worst cconomic depression and the Great Plains region suffered its worst drought in recorded history. As the economy sank into a deep depression and unemployment rates increased, the political climate Line for direct federal govermnent involvement in water projects improved. President Franklin Rooseveh's first 100 days in office brought a number of new laws to deal with the severe economic depression that became known as the Great Depression. Two of these laws, the Tennessee Valley Authority Act of 1933 and the National Recovery Act of 1933 (NIRA), had particular <b>significance</b> for water resource development.</p>
                        <p>The natural pattern of the Tennessee River was characterized by large spring flows that produced destructive floods and low summer flows that inhibited navigation. The intensily and frequency of the events discouraged development and contributed to persistent poverty in the valley. <b>To counter</b> these natural obstacles, the Tennessee Valley Authority Act of 1933 created the Tennessee Valley Authority (TVA), a public agency with broad powers to promote development in the region, including the <b>authority</b> to build dams and reservoirs and to generate and sell hydroelectric power. The TVA is a unique institution in that it brings all the water-related functions of the federal government under a single body. The TVA used its authority to <b>transform</b> the Tennessee River into one of the most highly regulated rivers in the world within about two decades. The TVA inherited the Wilson Dam, and by the beginning of the Second World War it had completed six additional multipurpose dams with power plants and locks for navigation. Investments in dams and hydropower.</p>
                        <p>facilities within the Tennessee Valley also received high priority during the war. The NIRA authorized the creation of the Public Works Administration to create jobs while undertaking work of benefit to the community. The NIRA also gave the United States President s powers to initiate public works, including water projects. The Public Works Administration provided loans and grants to state and local governments and to federal agencies for municipal waterworks, sewage plants, irrigation, flood control, and waterpower projects.</p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 29,
                        "soal" => "All of the following are mentioned as resulting  from the Great Depression EXCEPT.",
                        "pilihan" => [
                        "an increase in unemployment",
                        "a change in political thinking",
                        "a different approach to water projects",
                        "a new study of the history of droughts",
                    ],
                    "jawaban" => "a different approach to water projects",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 30,
                        "soal" => "It can be inferred from the passage that before the 1930's the role of the federal government in water projects was .",
                        "pilihan" => [
                        "restricted to the Great Plains region",
                        "more important than its role in other conservation projects",
                        "more limited than it was after 1930",
                        "designed to help with drought recovery",
                    ],
                    "jawaban" => "more limited than it was after 1930",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 31,
                        "soal" => "The word &quot;significance&quot; in, paragraph 1 is closest in meaning to ..",
                        "pilihan" => [
                        "difference",
                        "disturbance",
                        "importance",
                        "excellence",
                    ],
                    "jawaban" => "importance",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 32,
                        "soal" => "Which of the following discouraged development of the Tennessee Valley prior to 1933?",
                        "pilihan" => [
                        "Laws imposed by the local government",
                        "The effects of seasonal flows of the river",
                        "The lack of suitable building materials",
                        "The geographical features of the valley",
                    ],
                    "jawaban" => "The effects of seasonal flows of the river",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 33,
                        "soal" => "The word &quot;counter&quot; in paragraph 2 is closest in meaning to",
                        "pilihan" => [
                        "explain",
                        "measure",
                        "exploit",
                        "overcome",
                    ],
                    "jawaban" => "overcome",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 34,
                        "soal" => "The passage mentions &quot;the authority to build dams and reservoirs&quot; in line 13 as an example of the…",
                        "pilihan" => [
                        "wide powers of the Tennessee Valley Authority",
                        "responsibilities of regional governments",
                        "federal government's interests in profit- making water projects",
                        "development needed tomgenerate hydroelectric power",
                    ],
                    "jawaban" => "wide powers of the Tennessee Valley Authority",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 35,
                        "soal" => "the word &quot;transform&quot; in paragraph 2 is closest in meaning to",
                        "pilihan" => [
                        "clean",
                        "change",
                        "control",
                        "widen",
                    ],
                    "jawaban" => "change",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 36,
                        "soal" => "According to the passage, the Tennessee Valley Authority decided to…",
                        "pilihan" => [
                        "introduce rules to control the use of the Tennessee River",
                        "build the Wilson Dam",
                        "reduce investment in hydropower facilities in the Tennessee Valley",
                        "increase the price of electricity",
                    ],
                    "jawaban" => "introduce rules to control the use of the Tennessee River",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 37,
                        "soal" => "The word &quot;it&quot; in paragraph 2 refers to.",
                        "pilihan" => [
                        "the Tennessee River",
                        "the TVA",
                        "the Wilson Dam",
                        "the Second World War",
                    ],
                    "jawaban" => "the TVA",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 38,
                        "soal" => "The word &quot;unprecedented&quot; in paragraph 3 is closest in meaning to ...",
                        "pilihan" => [
                        "not extensive",
                        "not used often",
                        "not existing before",
                        "not needing money",
                    ],
                    "jawaban" => "not existing before",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 39,
                        "soal" => "According to the passage, one of the functions of the Public Works Administration was to….",
                        "pilihan" => [
                        "replace the NIRA",
                        "regulate federal agencies",
                        "influence presidential policy",
                        "give financial support to state and local governments",
                    ],
                    "jawaban" => "give financial support to state and local governments",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p>Questions 40-50</p>
                        <p>Many of the most flexible examples of tool use in animals come from primates (the order that includes humans, apes, and monkeys). For example, many wild primates use objects to threaten outsiders. But there are many examples of tool use by other mammals, as well as by birds and other types of animals. </p>
                        <p>Tools are used by many species in the capture or preparation of food. Chimpanzees use sticks and poles to bring out ants and <b>termites</b> from their hiding places. Among the most complex tool use observed in the wild is the use of stones by Ivory Coast chimpanzees to crack nuts open. They select a large flat stone as an anvil (a heavy block on which to place the nuts) and a smaller stone as a hammer. Stones suitable for use as anvils are not easy to find, and often a chimpanzee may carry a <b>haul</b> of nuts more than 40 meters to find a suitable anvil. The use of tools in chimpanzees is especially interesting because these animals sometimes modify tools to make <b>them</b> better suited for their intended purpose. To make a twig more effective for digging out termites, for example, a chimp may first <b>strip</b> it of its leaves. </p>
                        <p>Surprisingly, there is also a species of bird that uses sticks to probe holes in the search for insects. One of the species of Galapagos finch, the woodpecker finch, picks up or breaks off a twig, cactus spine, or leaf stem. This primitive tool is then held in the beak and used to probe for insects in holes in trees that the bird cannot probe directly with its beak. Birds have been seen to carry twigs from tree to tree searching for prey. Tools may also be used for defense. Hermit crabs grab sea anemones with their claws and use them as weapons to repel their enemies. Studies have demonstrated that these crabs significantly improve their chances against predators such as octopus by means of this tactic. Also, many species of forest-dwelling primates defend themselves by throwing objects, including stones, at intruders.</p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 40,
                        "soal" => " What does the passage mainly discuss?",
                        "pilihan" => [
                        "Primates are superior to other animals in using tools.",
                        "The use of stones as tools is similar across different animal species.",
                        "Birds and primates use tools that are different from those of sea animals.",
                        "Many animals have developed effective ways of using tools",
                    ],
                    "jawaban" => "Many animals have developed effective ways of using tools",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 41,
                        "soal" => "Why does the author mention ants and termites in paragraph 2 ?",
                        "pilihan" => [
                        "To give an example of food that chimpanzees collect by using tools",
                        "To emphasize that ants and termites often hide together in the same place ",
                        "To identify an important part of the chimpanzee diet",
                        "To point out a difference between two closely related species",
                    ],
                    "jawaban" => "To give an example of food that chimpanzees collect by using tools",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 42,
                        "soal" => "According to the passage, Ivory Coast chimpanzees are among the most remarkable of animal tool users because they…",
                        "pilihan" => [
                        "use tools to gather food",
                        "use more than one tool to accomplish a task",
                        "transport tools from one place to another",
                        "hide their tools from other animals",
                    ],
                    "jawaban" => "use more than one tool to accomplish a task",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 43,
                        "soal" => "The word &quot;haul&quot; in paragraph 2 is closest in meaning",
                        "pilihan" => [
                        "diet",
                        "type",
                        "load",
                        "branch",
                    ],
                    "jawaban" => "load",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 44,
                        "soal" => "The word &quot;them&quot; in paragraph 2 refers to ...",
                        "pilihan" => [
                        "chimpanzees",
                        "animals",
                        "tools",
                        "termites",
                    ],
                    "jawaban" => "tools",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 45,
                        "soal" => "The word &quot;strip&quot; in paragraph 2 is closest in meaning to…",
                        "pilihan" => [
                        "search",
                        "eat",
                        "carry",
                        " remove",
                    ],
                    "jawaban" => " remove",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 46,
                        "soal" => "The word &quot;probe&quot; in paragraph 3 is closest in meaning",
                        "pilihan" => [
                        "change",
                        "watch",
                        "explore",
                        "create",
                    ],
                    "jawaban" => "create",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 47,
                        "soal" => "According to the passage, what is characteristic are among the most remarkable of animal tool of the way in which woodpecker finches hunt users because they . insects?",
                        "pilihan" => [
                        "The finches use different plant parts as tools to capture insects.",
                        "The finches make narrow holes in trees to  trap insects.",
                        "The finches pick up insects that they find on leaves.",
                        "The finches catch insects in the air as they fly rom tree to ree.",
                    ],
                    "jawaban" => "The finches catch insects in the air as they fly rom tree to ree.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 48,
                        "soal" => "Which of the following can be inferred from the passage about the behavior of the woodpecker finch?",
                        "pilihan" => [
                        "It uses its beak as a weapon against itsenemies.",
                        "It uses the same twig to look for food in different trees.",
                        "It uses twigs and leaves to build its nest.",
                        "It avoids areas where cactus",
                    ],
                    "jawaban" => "It uses the same twig to look for food in different trees.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 49,
                        "soal" => "According to the passage, studies have shown that hermit crabs manage to turn octopus away by ….",
                        "pilihan" => [
                        "attacking the octopus with their claws",
                        "using stones as weapons",
                        "defending themselves with sea anemones",
                        "hiding under sea plants",
                    ],
                    "jawaban" => "defending themselves with sea anemones",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 50,
                        "soal" => "Forest primates and certain sea animals aremmentioned in the passage as examples of animalsmthat use tools for….",
                        "pilihan" => [
                        "self-protection",
                        "food preparation",
                        "hunting prey",
                        "building nests or home plants grow.",
                    ],
                    "jawaban" => "self-protection",
                    ]
                ],
            ];
        } else if($id == 7){
            $data = [

                [
                    "tipe" => "petunjuk",
                    "data" => "Part A"
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 1,
                        "soal" => "",
                        "pilihan" => [
                            "He makes a lot of money",
                            "He has just been left some money",
                            "He doesn’t believe three hundred dollars is enough",
                            "He can’t afford to spend that much",
                        ],
                        "jawaban" => "He can’t afford to spend that much",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 2,
                        "soal" => "",
                        "pilihan" => [
                            "He knows what is wrong with thw watch",
                            "The woman doesn’t need to buy another battery",
                            "The woman should get a new watch",
                            "The jewely store can probability repair the woman’s watch.",
                        ],
                        "jawaban" => "The jewely store can probability repair the woman’s watch.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 3,
                        "soal" => "",
                        "pilihan" => [
                            "He has another meeting to attend on thar day",
                            "He’s available either day",
                            "He can’t attend a two-day conference",
                            "Not everybody will go to same meeting",
                        ],
                        "jawaban" => "He has another meeting to attend on thar day",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 4,
                        "soal" => "",
                        "pilihan" => [
                            "Go to beach with her friends",
                            "Postpone her meeting with Professor Jones",
                            "See Professor Jones after class",
                            "Give a speech in Professor Jones’s class",
                        ],
                        "jawaban" => "See Professor Jones after class",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 5,
                        "soal" => "",
                        "pilihan" => [
                            "She isn’t a very good student",
                            "She hasn’t gotten her grades yet",
                            "She should’t woryy about her grades",
                            "She doesn’t like to tall about grades",
                        ],
                        "jawaban" => "She should’t woryy about her grades",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 6,
                        "soal" => "",
                        "pilihan" => [
                            "The classes have improved his health",
                            "His new glasses fit better than the old ones",
                            "He’s thinking of taking exercise classes",
                            "He’s unhappy about his lif",
                        ],
                        "jawaban" => "The classes have improved his health",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 7,
                        "soal" => "",
                        "pilihan" => [
                            "She also found the book difficult",
                            "She has learned a lot about names",
                            "She doesn’t remember the title of the novel.",
                            "She read a different book.",
                        ],
                        "jawaban" => "She also found the book difficult",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 8,
                        "soal" => "",
                        "pilihan" => [
                            "They’ll have go to a later show",
                            "The people in line all have tickets",
                            "She doesn’t want to go to the second show",
                            "The won’t have wait much longer",
                        ],
                        "jawaban" => "They’ll have go to a later show",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 9,
                        "soal" => "",
                        "pilihan" => [
                            "If it’s too late for herto dropp the course",
                            "If she sympathizes with him",
                            "If she apologized for what she did",
                            "If she regrets taking the course",
                        ],
                        "jawaban" => "If she regrets taking the course",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 10,
                        "soal" => "",
                        "pilihan" => [
                            "She’ll be traveling during winter break",
                            "She’ll be working during vacatiom",
                            "She’s looking forward to going home",
                            "She wants to hire another research assistant",
                        ],
                        "jawaban" => "She’ll be working during vacatiom",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 11,
                        "soal" => "",
                        "pilihan" => [
                            "He’s glad he called the doctor",
                            "He wants to change the appointment",
                            "He can’t come until 4:15",
                            "He was confused about the date of the appointment",
                        ],
                        "jawaban" => "He was confused about the date of the appointment",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 12,
                        "soal" => "",
                        "pilihan" => [
                            "No one believe he won the scholarship",
                            "He’s surprised that the got the scholarship",
                            "It isn’t true that the won the scholarship",
                            "He’s glad to award the woman the scholarship",
                        ],
                        "jawaban" => "He’s surprised that the got the scholarship",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 13,
                        "soal" => "",
                        "pilihan" => [
                            "During ecomomics class",
                            "Before economics",
                            "In about an hour",
                            "The next day",
                        ],
                        "jawaban" => "The next day",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 14,
                        "soal" => "",
                        "pilihan" => [
                            "The nurse wasn;t able to help her",
                            "She’s going to help tha as soon as the feel better",
                            "She thinks she should ask the nurse for a pill",
                            "She fells sleepy because of the medicine she took",
                        ],
                        "jawaban" => "She fells sleepy because of the medicine she took",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 15,
                        "soal" => "",
                        "pilihan" => [
                            "Whether she can make a proposal",
                            "Wheater Bill needs hel help",
                            "Wheater she can speak for Bill",
                            "Whether she can speak for Bill",
                        ],
                        "jawaban" => "Wheater she can speak for Bill",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 16,
                        "soal" => "",
                        "pilihan" => [
                            "He can’t wear the shirt right now",
                            "He can’t find the shirt",
                            "He doesn’t like the shirt",
                            "He thinks the shirt is innapropriate for the occasion",
                        ],
                        "jawaban" => "He can’t wear the shirt right now",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 17,
                        "soal" => "",
                        "pilihan" => [
                            "He has three classes in a row",
                            "His class begins at one o’clock",
                            "His class meets for three hours",
                            "He will be in class all afternoon",
                        ],
                        "jawaban" => "His class meets for three hours",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 18,
                        "soal" => "",
                        "pilihan" => [
                            "The team won despite poor play",
                            "The team has to play at least one game",
                            "At least the football team played well",
                            "The team should have won the game",
                        ],
                        "jawaban" => "The team won despite poor play",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 19,
                        "soal" => "",
                        "pilihan" => [
                            "She needed warmer clothing than in previous summers",
                            "She knitted two sweaters in August",
                            "August was waemer than the rest of the summer",
                            "She was Unusually busy all summer",
                        ],
                        "jawaban" => "She needed warmer clothing than in previous summers",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 20,
                        "soal" => "",
                        "pilihan" => [
                            "If the man is going to the store",
                            "How the man feels about the news",
                            "If the man is going to lose his job",
                            "Where the man heard the news",
                        ],
                        "jawaban" => "If the man is going to lose his job",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 21,
                        "soal" => "",
                        "pilihan" => [
                            "It will be ready at four o’clock today",
                            "It can be picked up at two o’clock tomorrow",
                            "It will be ready in two hours",
                            "Only two rolls will be ready on time",
                        ],
                        "jawaban" => "It can be picked up at two o’clock tomorrow",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 22,
                        "soal" => "",
                        "pilihan" => [
                            "He’ll go to the party with the woman",
                            "He met the man at the party",
                            "He has changed his plans",
                            "He has to work late",
                        ],
                        "jawaban" => "He has changed his plans",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 23,
                        "soal" => "",
                        "pilihan" => [
                            "Pay for some of the food",
                            "Insist on choosing their own food",
                            "Treat Gry to dinner some other time",
                            "Thank Gary for his generous offer",
                        ],
                        "jawaban" => "Pay for some of the food",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 24,
                        "soal" => "",
                        "pilihan" => [
                            "She used to work at a newspaper",
                            "She’d like her supervisor’s opinion of the work",
                            "She wishes she had a different kind of job",
                            "She meets with her supervisor regularly",
                        ],
                        "jawaban" => "She’d like her supervisor’s opinion of the work",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 25,
                        "soal" => "",
                        "pilihan" => [
                            "She rearraged the chapters of her book",
                            "She assured him that the chapter was finished",
                            "She worked on the chapter for quite a while",
                            "She wasn’t sure how to end the book",
                        ],
                        "jawaban" => "She worked on the chapter for quite a while",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 26,
                        "soal" => "",
                        "pilihan" => [
                            "There’s room to stack up the cans of coffe",
                            "The stor is out of coffe",
                            "They should buy a lot of a coffe",
                            "They should wait for a better deals on coffe",
                        ],
                        "jawaban" => "They should buy a lot of a coffe",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 27,
                        "soal" => "",
                        "pilihan" => [
                            "She works very hard",
                            "She is very strict",
                            "Her classes fill up quickly",
                            "It’s easy to get good grades in her courses",
                        ],
                        "jawaban" => "She is very strict",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 28,
                        "soal" => "",
                        "pilihan" => [
                            "The office already mailed the man’s birth certificate",
                            "The office no longer longer issues birt certificates",
                            "The man doesn’t have sufficient identification for his request",
                            "The man will have to apply for his birth certificate in writing",
                        ],
                        "jawaban" => "The man will have to apply for his birth certificate in writing",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 29,
                        "soal" => "",
                        "pilihan" => [
                            "The woman has a choice early flights",
                            "Not many planes go to Washington",
                            "The woman should take the earliner flight",
                            "The six o’clock flight is already filled",
                        ],
                        "jawaban" => "The woman has a choice early flights",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 30,
                        "soal" => "",
                        "pilihan" => [
                            "She would rather not invite other clubs to join them",
                            "They shoukd prepare extra refreshments",
                            "The members of the club always eat a lot",
                            "There was too much foof at a previous meeting",
                        ],
                        "jawaban" => "There was too much foof at a previous meeting",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "Part B"
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 31,
                        "soal" => "",
                        "pilihan" => [
                            "Get a ride home with Nancy ",
                            "Find a place to live",
                            "Go to store before it closes",
                            "Carry his grocies home",
                        ],
                        "jawaban" => "Carry his grocies home",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 32,
                        "soal" => "",
                        "pilihan" => [
                            "He didn’t except to buy a lot",
                            "He hand only one bag of groceries",
                            "The supermarket is just down the block",
                            "He thought he’d get a ride with the kramers",
                        ],
                        "jawaban" => "He didn’t except to buy a lot",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 33,
                        "soal" => "",
                        "pilihan" => [
                            "They are paying for his education",
                            "They invited him to their party",
                            "They took hm on a vacation with them",
                            "They let him live with them for free",
                        ],
                        "jawaban" => "They let him live with them for free",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 34,
                        "soal" => "",
                        "pilihan" => [
                            "She was impressed by it",
                            "It was a waste of money",
                            "She was amazed it had opened so soon",
                            "She didn’t like it as mucj as the other wings",
                        ],
                        "jawaban" => "She was impressed by it",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 35,
                        "soal" => "",
                        "pilihan" => [
                            "He took a tour of the city",
                            "He read about it",
                            "He wrote an article about it",
                            "He worked there as a guide",
                        ],
                        "jawaban" => "He read about it",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 36,
                        "soal" => "",
                        "pilihan" => [
                            "They came from the original wing",
                            "They’re made of the same material",
                            "The’re Similar in shape",
                            "The were designed by the person",
                        ],
                        "jawaban" => "The’re Similar in shape",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 37,
                        "soal" => "",
                        "pilihan" => [
                            "It was made of aluminum",
                            "It wasn’t large enough",
                            "It would’t move un the wind",
                            "It was too heavy to put up",
                        ],
                        "jawaban" => "It was too heavy to put up",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "Part C"
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 38,
                        "soal" => "",
                        "pilihan" => [
                            "To review material that will be on a test",
                            "To introduce a new professor",
                            "To explain changes in the schedule",
                            "To describe the contents of a paper",
                        ],
                        "jawaban" => "To explain changes in the schedule",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 39,
                        "soal" => "",
                        "pilihan" => [
                            "At the beginning",
                            "In the middle",
                            "One week before the end",
                            "At the end",
                        ],
                        "jawaban" => "In the middle",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 40,
                        "soal" => "",
                        "pilihan" => [
                            "Administer an examination",
                            "Present a confetence paper",
                            "Explain next week’s schedule",
                            "Take attendance in class",
                        ],
                        "jawaban" => "Administer an examination",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 41,
                        "soal" => "",
                        "pilihan" => [
                            "A regular class will be given",
                            "An optional review class will be given",
                            "An exam will be given\Class will be canceled",
                            "Take attendance in class",
                        ],
                        "jawaban" => "A regular class will be given",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 42,
                        "soal" => "",
                        "pilihan" => [
                            "Rock formations in the Nevada desert",
                            "Graduate studies in anthropology",
                            "Excavation techniques used in archaeology",
                            "Prehistoric desert people of Nevada",
                        ],
                        "jawaban" => "Prehistoric desert people of Nevada",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 43,
                        "soal" => "",
                        "pilihan" => [
                            "They planned their migrations",
                            "The didn’t travel far from their base camps",
                            "They hid from their enemies in caves",
                            "They planted seeds near their camps",
                        ],
                        "jawaban" => "They planned their migrations",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 44,
                        "soal" => "",
                        "pilihan" => [
                            "They had trouble finding itLack of light made it impossible ",
                            "It was too small for a group to fit into",
                            "Items stored by others took up most the space",
                            "Items stored by others took up most of the space",
                        ],
                        "jawaban" => "It was too small for a group to fit into",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 45,
                        "soal" => "",
                        "pilihan" => [
                            "Prehistoric desert people",
                            "Migratory animals",
                            "Food supplies and tools",
                            "Growing plants",
                        ],
                        "jawaban" => "Food supplies and tools",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 46,
                        "soal" => "",
                        "pilihan" => [
                            "To illustrate the size of some objects",
                            "To introduce the next assignment",
                            "To show some artifacts on display at the campus museum",
                            "To demonstrate his photographic ability",
                        ],
                        "jawaban" => "To illustrate the size of some objects",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 47,
                        "soal" => "",
                        "pilihan" => [
                            "A comparison offish to warm-blooded animals",
                            "The difference between saltwater and freshwater environments",
                            "The importance of fish to human beings",
                            "How water has affected the development of fish",
                        ],
                        "jawaban" => "How water has affected the development of fish",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 48,
                        "soal" => "",
                        "pilihan" => [
                            "It can’t be compressed",
                            "It is often polluted",
                            "Its temperature often fluctuates dramatically",
                            "It limits their size",
                        ],
                        "jawaban" => "It can’t be compressed",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 49,
                        "soal" => "",
                        "pilihan" => [
                            "A whale",
                            "A human",
                            "A snake",
                            "A snail",
                        ],
                        "jawaban" => "A snake",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 50,
                        "soal" => "",
                        "pilihan" => [
                            "Its skeleton",
                            "Its shape",
                            "Its senses",
                            "Its body temperature",
                        ],
                        "jawaban" => "Its shape",
                    ]
                ],
            ];
        } else if($id == 8){
            $data = [

                [
                    "tipe" => "petunjuk",
                    "data" => "
                        STRUCTURE
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 1,
                        "soal" => "According to third law of thermodynamics,….possible is -273.16 degrees centigrade",
                        "pilihan" => [
                            "That temperature is lowest",
                            "The temperature is lowest",
                            "Lowest temperature",
                            "The lowest temperature",
                        ],
                        "jawaban" => "The lowest temperature",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 2,
                        "soal" => "After the first World War, the author AnaYs Nin became interested in the art movement known as Surrealism and in psychoanalysis, both…. Her novels and short stones",
                        "pilihan" => [
                            "In which iOfluence",
                            "Of which influence",
                            "To have influence",
                            "Its influence in",
                        ],
                        "jawaban" => "Of which influence",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 3,
                        "soal" => "Muskrats generally…..close to the edge of a bog, where their favorite olants foods grow plentifully ",
                        "pilihan" => [
                            "Staying",
                            "They are staying",
                            "Stay",
                            "To stay there",
                        ],
                        "jawaban" => "Stay",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 4,
                        "soal" => "Oliver Ellsorth, ….of the United States Supreme Court, was the author of the bill that established the federal court system",
                        "pilihan" => [
                            "He was the third chief justice",
                            "The third chief justice was",
                            "Who the third chief justice",
                            "The third chief justice",
                        ],
                        "jawaban" => "The third chief justice",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 5,
                        "soal" => "…. Colonial period the great majority of Connecticut’s settlers came from England",
                        "pilihan" => [
                            "Since",
                            "The time",
                            "During the",
                            "It was",
                        ],
                        "jawaban" => "The time",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 6,
                        "soal" => "A politician can make a legislative proposal more ….by giving specific examples of what its effet will be.",
                        "pilihan" => [
                            "To understanding",
                            "Understandably",
                            "Understandable",
                            "When ynderstood",
                        ],
                        "jawaban" => "Understandably",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 7,
                        "soal" => "Playing the trumpet eith dazzing originality,….dominated jazz for 20 years",
                        "pilihan" => [
                            "Louis Armstrong",
                            "The influence of Louis Armstrong",
                            "The music of Louis Armstrong",
                            "Louis Armstrong’s talent",
                        ],
                        "jawaban" => "Louis Armstrong",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 8,
                        "soal" => "Before every presidential election in the United States, the statisticians try to guess the proportion of the population that….for each candidate",
                        "pilihan" => [
                            "Are voted",
                            "Voting",
                            "To be voted",
                            "Will vote",
                        ],
                        "jawaban" => "Will vote",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 9,
                        "soal" => "…..at a river forf on the Donner Pass route to California, the city of Reno grew as bridges and railroads were built",
                        "pilihan" => [
                            "Settle",
                            "To settle",
                            "It was settling",
                            "Having been settled",
                        ],
                        "jawaban" => "Having been settled",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 10,
                        "soal" => "The air inside a house or office building often has sigher concentrations of contaminants….heavily polluted outside air",
                        "pilihan" => [
                            "Than does",
                            "More",
                            "As some that are",
                            "Like of",
                        ],
                        "jawaban" => "Than does",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 11,
                        "soal" => "The decimal numeral system is one of the… ways of expressing numbers",
                        "pilihan" => [
                            "Useful most word’s",
                            "Word’s most useful",
                            "Useful word’s most",
                            "Most word’s useful",
                        ],
                        "jawaban" => "Word’s most useful",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 12,
                        "soal" => "Emily Dickinson’s garden was a place ….great inspiration for her poems",
                        "pilihan" => [
                            "That she drew",
                            "By drawing her",
                            "From which she drew",
                            "Drawn from which",
                        ],
                        "jawaban" => "From which she drew",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 13,
                        "soal" => "The mountains surrounding Loa Angeles effectively shield the city from the hot, dry winds of the Mojave Desert, … the circulation of air",
                        "pilihan" => [
                            "But they also prevent",
                            "Also prevented by them",
                            "And also to prevent",
                            "And also preventing",
                        ],
                        "jawaban" => "But they also prevent",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 14,
                        "soal" => "Not only…to detennine the depth of the ocean floorm but it is also used to locate oil",
                        "pilihan" => [
                            "To use seismology",
                            "Is seismology used",
                            "Seismology is used",
                            "Using seismology",
                        ],
                        "jawaban" => "Is seismology used",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 15,
                        "soal" => "Nebraska has floods in some years,…",
                        "pilihan" => [
                            "In others drought",
                            "Droughts are others",
                            "While other droughts",
                            "Others in droughts",
                        ],
                        "jawaban" => "In others drought",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 16,
                        "soal" => "Pop Art was a <u>movement</u> of the 1950's and 1960's <u>whom</u> imagery was <u>based</u> on readily Recognized American products and <u>people</u>.",
                        "pilihan" => [
                            "movement",
                            "whom",
                            "based",
                            "people",
                        ],
                        "jawaban" => "whom",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 17,
                        "soal" => "Because the tachinid fly is a parasite of <u>harmful</u> insects, <u>much</u> species <u>have been  imported</u> into the  United States <u>to combat</u> insect pests.",
                        "pilihan" => [
                            "harmful",
                            "much",
                            "have been  imported",
                            "to combat",
                        ],
                        "jawaban" => "much",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 18,
                        "soal" => "<u>All almost</u> the electricity for <u>industrial</u> <u>use</u> comes from large generators <u>driven</u> by steam turbines.",
                        "pilihan" => [
                            "All almost",
                            "industrial",
                            "use",
                            "driven",
                        ],
                        "jawaban" => "All almost",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 19,
                        "soal" => "The Egyptians <u>first</u> discovered that <u>drying</u> fruit preserved it, made it <u>sweeter</u>, and <u>improyement</u> its flavor.",
                        "pilihan" => [
                            "first",
                            "drying",
                            "sweeter",
                            "improyement",
                        ],
                        "jawaban" => "improyement",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 20,
                        "soal" => "During <u>his twelve year there</u>, Ellis Marsalis <u>turned</u> the New Orleans Center for the Creative Arts into <u>a rich</u> training place for future jazz <u>stars</u>.",
                        "pilihan" => [
                            "his twelve year there",
                            "turned",
                            "a rich",
                            "stars",
                        ],
                        "jawaban" => "his twelve year there",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 21,
                        "soal" => "Algebra is the <u>branch</u> of mathematics concerned with operations on <u>sets</u> of numbers or other <u>Elements</u> that are often represented <u>at</u> symbols.",
                        "pilihan" => [
                            "branch",
                            "sets",
                            "Elements",
                            "at",
                        ],
                        "jawaban" => "at",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 22,
                        "soal" => "<u>As</u> her focus <u>changed</u>, the love poetry that Edna St. Vincent Millay <u>produced</u> in the 1920's <u>Increasing</u> gave way to poetry dealing with social injustice.",
                        "pilihan" => [
                            "As",
                            "changed",
                            "produced",
                            "Increasing",
                        ],
                        "jawaban" => "Increasing",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 23,
                        "soal" => "When a pearl is <u>cut in</u> half and examined under <u>a microscope</u>, <u>but its</u> layers can <u>be seen</u>.",
                        "pilihan" => [
                            "cut in",
                            "a microscope",
                            "but its",
                            "be seen",
                        ],
                        "jawaban" => "but its",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 24,
                        "soal" => "A conductor <u>uses</u> signals and gestures to let the <u>musicians</u> <u>to know</u> when to <u>play</u> various parts of a composition.",
                        "pilihan" => [
                            "uses",
                            "musicians",
                            "to know",
                            "play",
                        ],
                        "jawaban" => "to know",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 25,
                        "soal" => "<u>If</u> a glass lizard loses its <u>tails</u>, <u>a new</u> one grows to <u>replace</u> it.",
                        "pilihan" => [
                            "If",
                            "tails",
                            "a new",
                            "replace",
                        ],
                        "jawaban" => "tails",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 26,
                        "soal" => "Many of the <u>recording</u> instruments used in <u>vary</u> <u>branches</u> of science <u>are</u> kymographs.",
                        "pilihan" => [
                            "recording",
                            "vary",
                            "branches",
                            "are",
                        ],
                        "jawaban" => "vary",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 27,
                        "soal" => "It was <u>near end</u> of <u>prehistoric</u> times <u>that the first</u> <u>wheeled</u> vehicles appeared.",
                        "pilihan" => [
                            "near end",
                            "prehistoric",
                            "that the first",
                            "wheeled",
                        ],
                        "jawaban" => "near end",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 28,
                        "soal" => "Martin Luther King, Ir's magnificent <u>speaking</u> ability <u>enabling</u> him to <u>effectively</u> express the demands for social justice <u>for</u> Black Americans.",
                        "pilihan" => [
                            "speaking",
                            "enabling",
                            "effectively",
                            "for",
                        ],
                        "jawaban" => "enabling",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 29,
                        "soal" => "Designers of <u>athletic footwear</u> finely tune each <u>category of shoe</u> to its <u>particularly</u> activity by <u>studying</u> human motion and physiology.",
                        "pilihan" => [
                            "athletic footwear",
                            "category of shoe",
                            "particularly",
                            "studying",
                        ],
                        "jawaban" => "particularly",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 30,
                        "soal" => "Gothic Revival architecture <u>has</u> several <u>basis</u> characteristics that <u>distinguish</u> it from <u>other</u>",
                        "pilihan" => [
                            "has",
                            "basis",
                            "distinguish",
                            "other",
                        ],
                        "jawaban" => "basis",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 31,
                        "soal" => "Since rats are <u>destructive</u> and <u>may carry</u> disease, <u>therefore many</u> cities try to <u>exterminate</u> them.",
                        "pilihan" => [
                            "destructive",
                            "may carry",
                            "therefore many",
                            "exterminate",
                        ],
                        "jawaban" => "therefore many",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 32,
                        "soal" => "In the United States <u>among</u> 60 percent <u>of the space</u> on the pages of newspapers is <u>reserved</u> for <u>advertising</u>.",
                        "pilihan" => [
                            "among",
                            "of the space",
                            "reserved",
                            "advertising",
                        ],
                        "jawaban" => "among",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 33,
                        "soal" => "Recently in the automobile industry, multinational companies <u>have developed</u> to the point where <u>such few</u> cars can be described as <u>having been made</u> <u>entirely</u> in one country.",
                        "pilihan" => [
                            "have developed",
                            "such few",
                            "having been made",
                            "entirely",
                        ],
                        "jawaban" => "such few",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 34,
                        "soal" => "Scientists believe that by <u>altering</u> the genetic composition of plants it is possible to develop specimens that are <u>resisting</u> to <u>disease</u> and have <u>increased</u> food value.",
                        "pilihan" => [
                            "altering",
                            "resisting",
                            "disease",
                            "increased",
                        ],
                        "jawaban" => "resisting",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 35,
                        "soal" => "The purpose <u>of</u> traveler's checks <u>is</u> to protect travelers from <u>theft</u> and accidental <u>lost</u> of money.",
                        "pilihan" => [
                            "of",
                            "is",
                            "theft",
                            "lost",
                        ],
                        "jawaban" => "lost",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 36,
                        "soal" => "The early <u>periods of aviation</u> in the United States was marked by <u>exhibition flights</u> made by <u>individual fliers</u> or by <u>teams of performers</u> at country fairs.",
                        "pilihan" => [
                            "periods of aviation",
                            "exhibition flights",
                            "individual fliers",
                            "teams of performers",
                        ],
                        "jawaban" => "periods of aviation",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 37,
                        "soal" => "The American anarchist Emma Goldman infused her spirited lectures, <u>publishes</u>, and demonstrations <u>with</u> a passionate <u>belief</u> in the freedom of <u>the</u> individual.",
                        "pilihan" => [
                            "publishes",
                            "with",
                            "belief",
                            "the",
                        ],
                        "jawaban" => "publishes",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 38,
                        "soal" => "<u>Being</u> the biggest expanse of brackish water <u>in the</u> world, the Baltic Sea <u>is of</u> special <u>interesting</u> to scientists.",
                        "pilihan" => [
                            "Being",
                            "in the",
                            "is of",
                            "interesting",
                        ],
                        "jawaban" => "interesting",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 39,
                        "soal" => "<u>The</u> main <u>advertising</u> media include <u>direct</u> mail, radio, television, magazines, and  <u>newspaper</u>.",
                        "pilihan" => [
                            "The",
                            "advertising",
                            "direct",
                            "newspaper",
                        ],
                        "jawaban" => "newspaper",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 40,
                        "soal" => "While studying the <u>chemistry</u> <u>of human body</u>, Dr. Rosalyn Yalow won a Nobel Prize for the  research she <u>conducted</u> on <u>the role</u> of hormones.",
                        "pilihan" => [
                            "chemistry",
                            "of human body",
                            "conducted",
                            "the role",
                        ],
                        "jawaban" => "of human body",
                    ]
                ],
            ];
        } else if($id == 9){
            $data = [

                [
                    "tipe" => "petunjuk",
                    "data" => "
                        READING
                    "
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p>Questions 1-9</p>
                        <p>The ocean bottom - a region nearly 2.5 times greater than the total land area of the Earth - is a vast <b><u>frontier</u></b> that even today is largely unexplored and uncharted. Until about a century ago, the deep- ocean floor was completely <b><u>inaccessible</u></b>, hidden beneath waters averaging over 3,600 meters deep. Line Totally without light and subjected to intense pressures hundreds of times greater than at the Earth's surface, the deep-ocean bottom is a hostile environment to humans, in some ways as forbidding and remote as the void of <b><u>outer space</u></b>. </p>
                        <p>Although researchers have taken samples of deep-ocean rocks and sediments for over a century, the first detailed global investigation of the ocean bottom did not actually start until 1968, with the beginning of the  National Science Foundation's Deep Sea Drilling Project (DSDP), Using techniques first developed for the offshore oil and gas industry, the DSDP's drill ship, the Glomar Challenger, was able to maintain a steady position on the ocean's surface and drill in very deep waters, <b><u>extracting</u></b> samples of sediments and rock from the ocean floor. </p>
                        <p>The Gicunar Challenger completed 96 voyages in a 15-year research program that ended in. November 1983. During this time, the vessel logged 600,000 kilometers and took almost 20,000 core samples of seabed sediments and rocks at 624 drilling sites around the world.  The Glomar Challenger' score samples have allowed geologists to reconstruct what the planet looked like hundreds of millions of years ago and to calculate what it will probably look like millions of years &quot;in the future. Today, largely on the <b><u>strength</u></b> of evidence gathered during the Glomar Challenger's voyages, nearly all earth scientists Agree on the theories of plate tectonics and continental drift that explain many of the geological processes that shape the Earth.</p>
                        <p>The cores of sediment drilled by the Glomar Challenger have also yielded information critical to understanding the world's past climates. Deep-ocean sediments provide a climatic record stretching back hundreds of millions of years because <b><u>they</u></b> are largely isolated from the mechanical erosion and the intense chemical and biological activity that rapidly destroy much land-based evidence of past climates. This record has already provided insights into the patterns and causes of past climatic change information that may be used to predict future climates.</p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 1,
                        "soal" => "The author refers to the ocean bottom as a &quot;frontier&quot; in paragraph 1 because it ...",
                        "pilihan" => [
                            "is not a popular area for scientific research",
                            "contains a wide variety oflife forms",
                            "attracts courageous explorers",
                            "is an unknown territory",
                        ],
                        "jawaban" => "is an unknown territory",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 2,
                        "soal" => "The word &quot;inaccessible&quot; in paragraph 1 is closest in meaning to",
                        "pilihan" => [
                            "unrecognizable",
                            "unreachable",
                            "unusable",
                            "unsafe",
                        ],
                        "jawaban" => "unreachable",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 3,
                        "soal" => "The author mentions outer space in paragraph 2 because",
                        "pilihan" => [
                            "the Earth's climate millions of years ago was similar to conditions in outer space",
                            "it is similar to the ocean floor in being aliento the human environment",
                            "rock formations in outer space are similar those found the ocean floor",
                            "teachniques used by scientiest to explore outer space were similar to those used in ocean exploration.",
                        ],
                        "jawaban" => "it is similar to the ocean floor in being aliento the human environment",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 4,
                        "soal" => "Which of the following is true of the Glomar Challenger?",
                        "pilihan" => [
                            "It is a type of submarine.",
                            "It is an ongoing project.",
                            "it has gone on over 100 voyages,",
                            "It made its first DSDP voyage in 1968.",
                        ],
                        "jawaban" => "It made its first DSDP voyage in 1968.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 5,
                        "soal" => "The word &quot;extracting&quot; in paragraph 3 is closest in meaning to ",
                        "pilihan" => [
                            "breaking",
                            "locating",
                            "removing",
                            "analyzing",
                        ],
                        "jawaban" => "removing",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 6,
                        "soal" => "The Deep Sea Drilling Project was significant because it was …",
                        "pilihan" => [
                            "an attempt to find new sources of oil and gas",
                            "the first extensive exploration of the ocean bottom",
                            "composed of geologists from all over the world",
                            "funded entirely by the gas and oil industry",
                        ],
                        "jawaban" => "the first extensive exploration of the ocean bottom",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 7,
                        "soal" => "The word &quot;strength&quot; in paragraph 3 is closest in meaning to…",
                        "pilihan" => [
                            "basis",
                            "purpose",
                            "discovery",
                            "endurance",
                        ],
                        "jawaban" => "basis",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 8,
                        "soal" => "The word &quot;they&quot; in paragraph 4 refers to …",
                        "pilihan" => [
                            "years",
                            "climates",
                            "sediments",
                            "cores",
                        ],
                        "jawaban" => "sediments",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 9,
                        "soal" => "Which of the following is NOT mentioned in the passage as being a result of the Deep Sea Drilling Project?",
                        "pilihan" => [
                            "Geologists were able to determine the Earth's appearance hundreds of millions of years ago.",
                            "Two geological theories became more widely accepted by scientists.",
                            "Information was revealed about the Earth's past climatic changes.",
                            "Geologists observed forms of marine life never before seen.",
                        ],
                        "jawaban" => "Geologists observed forms of marine life never before seen.",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p>Questions 10-21</p>
                        <p>Basic to any understanding of Canada in the 20 years after the Second World War is the country's impressive population growth.For every three Canadians in 1945, there were over <b><u>five in</u></b> 1966. In September 1966 Canada's population passed the 20 million mark. Most of this <b><u>surging</u></b> growth came Line from natural increase. The depression of the 1930's and the war had held back marriages, and the catching-up process began after 1945. The baby boom continued through the decade of the 1950's, producing a population increase of nearly fifteen percent in the five years from 1951 to 1956. This rate of increase had been exceeded only once before in Canada's history, in the decade before 1911, when the prairies were being settled. Undoubtedly, the good economic conditions of the 1950's supported a growth in the population, but the expansion also derived from <b><u>a trend</u></b> toward earlier marriages and an increase in the average size of families. In 1957 the Canadian birth rate stood at 28 per thousand, one of the highest in the world. </p>
                        <p>After the <b><u>peak</u></b> year of 1957, the birth rate in Canada began to decline. It continued falling until in 1966 it stood at the lowest level in 25 years. Partly this decline reflected the low level of births during the depression and the war, but it was also caused by changes in Canadian society. Young people were staying at school longer; more women were working; young married couples were buying autamobiles or houses before starting families; rising living standards were cutting down the size of families. It appeared that Canada was once more falling in step with the trend toward smaller families that had occurred all through the Western world since the time of the Industrial Revolution. </p>
                        <p>Although the growth in Canada's population had slowed down by 1966 (the increase in the first half of the 1960's was only nine percent), another large population wave was coming over the horizon. It would be composed of the children of the children who were barn during the period of the high birth rate <b><u>prior to</u></b> 1957.</p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 10,
                        "soal" => "What does the passage mainly discuss?",
                        "pilihan" => [
                            "Educational changes in Canadian society",
                            "Canada during the Second World War",
                            "Population trends in postwar Canada",
                            "Standards of living in Canada",
                        ],
                        "jawaban" => "Population trends in postwar Canada",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 11,
                        "soal" => "According to the passage, when did Canada's baby boom begin?",
                        "pilihan" => [
                            "In the decade after 1911",
                            "After 1945",
                            "During the depression of the 1930's",
                            "In 1966",
                        ],
                        "jawaban" => "After 1945",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 12,
                        "soal" => "The word &quot;five&quot; in paragraph 1 refers to ,",
                        "pilihan" => [
                            "Canadians",
                            "years",
                            "decades",
                            "marriages",
                        ],
                        "jawaban" => "Canadians",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 13,
                        "soal" => "The word &quot;surging&quot; paragraph 1 is closest in meaning",
                        "pilihan" => [
                            "new",
                            "extra",
                            "accelerating",
                            "surprising",
                        ],
                        "jawaban" => "accelerating",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 14,
                        "soal" => "The author suggests that in Canada during the 1950's ...",
                        "pilihan" => [
                            "the urban population decreased rapidly",
                            "fewer people married",
                            "economic conditions were poor",
                            "the birth rate was very high",
                        ],
                        "jawaban" => "the birth rate was very high",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 15,
                        "soal" => "The word &quot;trend&quot; in paragraph 1 is closest in meaning",
                        "pilihan" => [
                            "tendency",
                            "aim",
                            "growth",
                            "directive",
                        ],
                        "jawaban" => "tendency",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 16,
                        "soal" => "The word &quot;peak&quot; in paragraph 2 is closest in meaning to ..",
                        "pilihan" => [
                            "pointed",
                            "dismal",
                            "mountain",
                            "maximum",
                        ],
                        "jawaban" => "maximum",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 17,
                        "soal" => "When was the birth rate in Canada at its lowest postwar level?",
                        "pilihan" => [
                            "1966",
                            "957",
                            "1956",
                            "1951",
                        ],
                        "jawaban" => "1966",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 18,
                        "soal" => "The author mentions all of the following as causes of declines in population growth after 1957 EXCEPT ...",
                        "pilihan" => [
                            "people being better educated",
                            "people getting married earlier",
                            "better standards of living",
                            "couples buying houses",
                        ],
                        "jawaban" => "people getting married earlier",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 19,
                        "soal" => "It can be inferred from the passage that before the Industrial Revolution…",
                        "pilihan" => [
                            "families were larger",
                            "population statistics were unreliable",
                            "the population grew steadily",
                            "economic conditions were bad",
                        ],
                        "jawaban" => "families were larger",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 20,
                        "soal" => "The word &quot;It&quot; in paragraph 3 refers to .",
                        "pilihan" => [
                            "horizon",
                            "population wave",
                            "nine percent",
                            "first half",
                        ],
                        "jawaban" => "population wave",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 21,
                        "soal" => "The phrase &quot;prior to&quot; in paragraph 3 is closest in meaning to.",
                        "pilihan" => [
                            "behind",
                            "since",
                            "during",
                            "preceding",
                        ],
                        "jawaban" => "preceding",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p>Questions 22-30<?p>
                        <p>Are organically grown foods the best food choices? The advantages claimed for such foods over conventionally grown and marketed food products are now being debated. <b><u>Advocates</u></b> of organic foods a term whose meaning varies greatly - frequently proclaim that such products are safer and more Line nutritious than <b><u>others</u></b>. <?p>
                        <p>The growing interest of consumers in the safety and nutritional quality of the typical North American diet is a welcome development. However, much of this interest has been sparked by sweeping claims that the food supply is unsafe or inadequate in meeting nutritional needs. Although most of these claims are not supported by scientific evidence, the preponderance of written material advancing such claims makes it difficult for the general public to separate fact from fiction. As a result, claims that eating a diet consisting entirely of organically grown foods prevents or cures disease or provides other benefits to health have become widely publicized and form the basis for folklore. <?p>
                        <p>Almost daily the public is besieged by claims for &quot;no-aging&quot; diets, new vitamins, and other wonder foods. There are numerous <b><u>unsubstantiated</u></b> reports that natural vitamins are superior to synthetic ones, that fertilized eggs are nutritionally superior to unfertilized eggs, that untreated grains are better than fumigated grains, and the like.<?p>
                        <p>One thing that most organically grown food products seem to have in common is that they cost more than conventionally grown foods. But in many cases consumers are misled if they believe organic foods can <b><u>maintain</u></b> health and provide better  there is real cause for concern if consumers, particularly those with limited incomes, distrust the regular food supply and buy only expensive organic foods instead. <?p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 22,
                        "soal" => "The word &quot;Advocates&quot; in paragraph 1 is dosest in meaning to which of the following?",
                        "pilihan" => [
                            "Proponents",
                            "Merchants",
                            "Inspectors",
                            "Consumers",
                        ],
                        "jawaban" => "Proponents",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 23,
                        "soal" => "In paragraph 1 , the word &quot;others&quot; refers to ...",
                        "pilihan" => [
                            "advantages",
                            "advocates",
                            "organic foods",
                            "Products",
                        ],
                        "jawaban" => "Products",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 24,
                        "soal" => "The &quot;welcome development&quot; mentioned in paragraph 2 is an increase in",
                        "pilihan" => [
                            "interest in food safety and nutrition among North Americans",
                            "the nutritional quality of the typical North American diet",
                            "the amount of healthy food grown in North America",
                            "the number of consumers in North America",
                        ],
                        "jawaban" => "interest in food safety and nutrition among North Americans",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 25,
                        "soal" => "According to the first paragraph, which of the following is true about the term &quot;organic foods&quot;?",
                        "pilihan" => [
                            "It is accepted by most nutritionists.",
                            "It has been used only in recent years.",
                            "It has no fixed meaning.",
                            "It is seldom used by consumers.",
                        ],
                        "jawaban" => "It has no fixed meaning.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 26,
                        "soal" => "The word &quot;unsubstantiated&quot; in paragraph 2 is closest in meaning to ...",
                        "pilihan" => [
                            "unbelievable",
                            "uncontested",
                            "unpopular",
                            "unverified",
                        ],
                        "jawaban" => "unverified",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 27,
                        "soal" => "The word &quot;maintain&quot; in paragraph 3 is closest in meaning to …..",
                        "pilihan" => [
                            "improve",
                            "monitor",
                            "preserve",
                            "restore",
                        ],
                        "jawaban" => "preserve",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 28,
                        "soal" => "The author implies that there is cause for concern. if consumers with limited incomes buy organic foods instead of conventionally grown foods because …",
                        "pilihan" => [
                            "organic foods can be more expensive but are often no better'than conventionally grown foods",
                            "many organic foods are actually less nutritious than similar conventionally grown foods",
                            "conventionally grown foods are more readily available than organic foods",
                            "too many farmers will stop using conventional methods to grow food crops",
                        ],
                        "jawaban" => "organic foods can be more expensive but are often no better'than conventionally grown foods",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 29,
                        "soal" => "According to the last paragraph, consumerswho believe that organic foods are better than conventionally grown foods are often …..",
                        "pilihan" => [
                            "careless",
                            "mistaken",
                            "thrifty",
                            "wealthy",
                        ],
                        "jawaban" => "mistaken",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 30,
                        "soal" => "What is the author's attitude toward the claims made by advocates of health foods?",
                        "pilihan" => [
                            "Very enthusiastic",
                            "Somewhat favorable",
                            "Neutral",
                            "Skeptical",
                        ],
                        "jawaban" => "Skeptical",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p>Questisons 31-40</p>
                        <p>There are many theories about the beginning of drama in ancient Greece. The one most widely accepted today is based on the assumption that drama evolved from ritual. The argument for this view goes as follows. In the beginning, human beings viewed the natural forces of the world, even the Line seasonal changes, as unpredictable and <b><u>they</u></b> sought, through various means, to control these unknown and feared powers. Those measures which appeared to bring the desired results were then retained and repeated until they hardened into fixed rituals. Eventually stories arose which explained or veiled the mysteries ofthe rites. As time passed some rituals were abandoned, but the stories, later called myths, persisted and provided material for art and drama.</p>
                        <p>Those who believe that drama evolved out of ritual also argue that those rites contained the seed of theater because music, dance, masks, and costumes were almost always used. Furthermore, a suitable site had to be provided for performances, and when the entire community did not participate, a clear division was usually made between the &quot;acting area&quot; and the &quot;auditorium.&quot; In addition, there were performers, and, since <b><u>considerable</u></b> importance was attached to avoiding mistakes in the <b><u>enactment</u></b> of rites, religious leaders usually assumed that task. Wearing masks and costumes, <b><u>they</u></b> often impersonated other people, animals, or supernatural beings, and mimed the desired effect - success in hunt or battle, the coming rain, the revival of the Sun - as an actor might. Eventually such dramatic representations were separated from religious activities.</p>
                        <p>Another theory traces the theater's origin from the human interest in storytelling. According to this view, tales (about the hunt, war, or other feats) are gradually elaborated, at first through the use of impersonation, action, and dialogue by a narrator and then through the assumption of each of the roles by a different person. A closely related theory traces theater to those dances that are primarily rhythmical and gymnastic or that are imitations of animal movements and sounds.</p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 31,
                        "soal" => "What does the passage mainly discuss?",
                        "pilihan" => [
                            "The origins of theater",
                            "The role of ritual in modem dance",
                            "The importance of storytelling",
                            "The variety of early religious activities",
                        ],
                        "jawaban" => "The origins of theater",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 32,
                        "soal" => "The word &quot;they&quot; in paragraph 1 refers to.",
                        "pilihan" => [
                            "seasonal changes",
                            "natural forces",
                            "theories",
                            "human beings",
                        ],
                        "jawaban" => "human beings",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 33,
                        "soal" => "What aspect of drama does the author discuss in the first paragraph?",
                        "pilihan" => [
                            "The reason drama is often unpredictable",
                            "The seasons in which dramas were performed",
                            "The connection between myths and dramatic plots",
                            "The importance of costumes in early drama",
                        ],
                        "jawaban" => "The connection between myths and dramatic plots",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 34,
                        "soal" => "Which of the following is NOT mentioned as a common element of theater and ritual?",
                        "pilihan" => [
                            "Dance",
                            "Costumes",
                            "Music",
                            "Magic",
                        ],
                        "jawaban" => "Magic",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 35,
                        "soal" => "The word &quot;considerable&quot; in paragraph 2 is closest in meaning to",
                        "pilihan" => [
                            "thoughtful",
                            "substantial",
                            "relational",
                            "ceremonial",
                        ],
                        "jawaban" => "substantial",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 36,
                        "soal" => "The word &quot;enactment&quot; in paragraph 2 is closest in meaning to.",
                        "pilihan" => [
                            "establishment",
                            "Performance",
                            "authorization",
                            "season",
                        ],
                        "jawaban" => "Performance",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 37,
                        "soal" => "The word “they” in paragraph 2 refers to…",
                        "pilihan" => [
                            "mistakes",
                            "costumes",
                            "animals",
                            "performers",
                        ],
                        "jawaban" => "performers",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 38,
                        "soal" => "According to the passage, what is the main difference between ritual and drama?",
                        "pilihan" => [
                            "Ritual uses music whereas drama does not.",
                            "Ritual is shorter than drama.",
                            "Ritual requires fewer performers than drama.",
                            "Ritual has a religious purpose and drama does not.",
                        ],
                        "jawaban" => "Ritual has a religious purpose and drama does not.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 39,
                        "soal" => "Tie passage supports which of the following statements?",
                        "pilihan" => [
                            "No one really knows how the theater began.",
                            "Myths are no longer represented dramatically.",
                            "Storytelling is an important part of dance.",
                            "Dramatic activities require the use costumes.",
                        ],
                        "jawaban" => "No one really knows how the theater began.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 40,
                        "soal" => "Where in the passage does the author discuss the separation of the stage and the audience?",
                        "pilihan" => [
                            "Lines 8-9",
                            "Lines 12-14",
                            "Lines 19-20",
                            "Lines 22-24",
                        ],
                        "jawaban" => "Lines 12-14",
                    ]
                ],
                [
                    "tipe" => "petunjuk",
                    "data" => "
                        <p>Questions 41-50</p>
                        <p><b><u>Staggering</u></b> tasks confronted the people of the United States, North and South, when the Civil War ended. About a million and a half soldiers from both sides had to be demobilized, readjusted to civilian life, and reabsorbed by the <b><u>devastated</u></b> economy. Civil government also had to be put back on a line peacetime basis and interference from the military had to be stopped.</p>
                        <p>The desperate plight of the South has eclipsed the fact that reconstruction had to be undertaken also in the North, though less spectacularly. Industries had to adjust to peacetime conditions; factories had to be retooled for civilian needs. </p>
                        <p>Financial problems loomed large in both the North and the South. The national debt had shot up from a modest $65 million in 1861, the year the war started, to nearly $3 billion in 1865, the year the war ended. This was a colossal sum for those days but  same time, war taxes had to be reduced to less burdensome levels. </p>
                        <p>Physical devastation caused by invading armies, chiefly in the South and border states, had to be repaired. This herculean <b><u>task</u></b> was ultimately completed. but with discouraging slowness. </p>
                        <p>Other important questions needed answering. What would be the future of the four million Black people who were freed from slavery? On what basis were the Southern states to be brought back into the Union? </p>
                        <p>What of the Southern leaders, all of whom were liable to charges of treason? One of these leaders, Jefferson Davis, president of the Southern Confederacy, was the subject of an insulting popular Northern song, &quot;Hang Jeff Davis from a Sour Apple Tree,&quot; and even children sang it. Davis was temporarily chained in his prison cell during the early days of his two-year imprisonment. But he and the other Southern leaders were finally released, partly bec   <b><u>them</u></b>. All the leaders were finally pardoned by President Johnson in 1868 in an effort to help reconstruction efforts proceed with as little bitterness as possible.</p>
                    "
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 41,
                        "soal" => "What does the passage mainly discuss?",
                        "pilihan" => [
                            "Wartime expenditures",
                            "Problems facing the United States after the",
                            "Methods of repairing the damage caused by the war",
                            "The results of government efforts to revive the economy",
                        ],
                        "jawaban" => "Problems facing the United States after the",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 42,
                        "soal" => "The word &quot;Staggering&quot; in paragraph 1 is closest in meaning to …",
                        "pilihan" => [
                            "specialized",
                            "confusing",
                            "various",
                            "overwhelming",
                        ],
                        "jawaban" => "overwhelming",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 43,
                        "soal" => "The word &quot;devastated&quot; in paragraph 1 is closest in Meaning to.",
                        "pilihan" => [
                            "developing",
                            "ruined",
                            "complicated",
                            "fragile",
                        ],
                        "jawaban" => "ruined",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 44,
                        "soal" => "According to the passage, which of the following statements about the damage in the South is correct?",
                        "pilihan" => [
                            "It was worse than in the North.",
                            "The cost was less than expected.",
                            "It was centered in the border states.",
                            "It was remedied rather quickly.",
                        ],
                        "jawaban" => "It was worse than in the North.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 45,
                        "soal" => "The passage refers to all of the following as necessary steps following the Civil War EXCEPT",
                        "pilihan" => [
                            "helping soldiers readjust.",
                            "restructuring industry",
                            "returning government to normal",
                            "increasing taxes",
                        ],
                        "jawaban" => "increasing taxes",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 46,
                        "soal" => "The word &quot;task&quot; in paragraph 4 refers to ...",
                        "pilihan" => [
                            "raising the tax level",
                            "sensible financial choices",
                            "wise decisions about former slaves",
                            "reconstruction of damaged areas",
                        ],
                        "jawaban" => "reconstruction of damaged areas",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 47,
                        "soal" => "Why does the author mention a popular song in",
                        "pilihan" => [
                            "To give an example of a Northern attitude towards the South",
                            "To illustrate the Northern love of music",
                            "To emphasize the cultural differences between the North and the South",
                            "To compare the Northern and Southern Presidents",
                        ],
                        "jawaban" => "To give an example of a Northern attitude towards the South",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 48,
                        "soal" => "The word &quot;them&quot; in paragraph 6 refers to.",
                        "pilihan" => [
                            "charges",
                            "leaders",
                            "days",
                            "irons",
                        ],
                        "jawaban" => "leaders",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 49,
                        "soal" => "Which of the following can be inferred from the phrase &quot;…. it was unlikely that a jury from Virginia, a Southern Confederate state, would convict them&quot; (paragraph 6 )?",
                        "pilihan" => [
                            "Virginians felt betrayed by Jefferson Davis.",
                            "A popular song insulted Virginia.",
                            "Virginians were loyal to their leaders.",
                            "All of the Virginia military leaders had been put in chains.",
                        ],
                        "jawaban" => "A popular song insulted Virginia.",
                    ]
                ],
                [
                    "tipe" => "soal",
                    "data" => [
                        "no" => 50,
                        "soal" => "It can be inferred from the passage that President Johnson pardoned the Southern leaders in order",
                        "pilihan" => [
                            "raise money for the North",
                            "repair the physical damage in the South",
                            "prevent Northern leaders from punishing more Southerners",
                            "help the nation recover from the war",
                        ],
                        "jawaban" => "help the nation recover from the war",
                    ]
                ],
            ];
        }

        foreach ($data as $i => $data) {
            $datas['id_sub'] = $id;
            $datas['item'] = $data['tipe'];

            if($data['tipe'] == 'soal'){
                $pilihan = "";
                foreach ($data['data']['pilihan'] as $pil) {
                    $pilihan .= "\"".$pil."\",";
                }
                $pilihan = substr($pilihan, 0, -1);
                $data_soal = "{\"soal\":\"<p>{no}".str_replace('"', '\"', $data['data']['soal'])."</p>\",\"pilihan\":[".$pilihan."],\"jawaban\":\"".$data['data']['jawaban']."\"}";
            } elseif($data['tipe'] == "audio") {
                $audio = $this->Main_model->get_one("audio", ["nama_audio" => str_replace(".mp3", "", $data['data'])]);
                $data_soal = $audio['id_audio'];
            } elseif ($data['tipe'] == "petunjuk") {
                $data_soal = $data['data'];
            }

            $datas['data'] = $data_soal;
            $datas['penulisan'] = "LTR";
            $datas['urutan'] = $i + 1;

            $this->subsoal->add_data("item_soal", $datas);
        }

        // echo "Selesai";
        redirect(base_url('subsoal'));
    }
}

/* End of file Soal.php */
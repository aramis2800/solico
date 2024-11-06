<?php

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = isset($_POST['data']) ? $_POST['data'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $recipient = isset($_POST['recipient']) ? $_POST['recipient'] : '';

    $response = '';

    switch ($subject) {
        case 'Account Set':
            #region Account Set Adaptive Card
            $response = [
                'type' => 'message',
                'attachments' => [
                    [
                        'contentType' => 'application/vnd.microsoft.card.adaptive',
                        'content' => [
                            '$schema' => 'http://adaptivecards.io/schemas/adaptive-card.json',
                            'type' => 'AdaptiveCard',
                            'version' => '1.4',
                            'body' => [
                                [
                                    'type' => 'ColumnSet',
                                    'columns' => [
                                        [
                                            'type' => 'Column',
                                            'width' => 'auto',
                                            'items' => [
                                                [
                                                    'type' => 'Image',
                                                    'url' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAA7DAAAOwwHHb6hkAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAA8ZJREFUSImVll9MHFUUxn/n7kDUxFqqiVZoE2lf/BeIuwNBSBR2gaIW1KghaZPSByUxbVpbq4m+UB+MiamQ9EWpCdVoYtuHWhRSurMlCg0pUxpA5cnWxFJ5aKpVY+LSnTk+zPJndwdaTzIv9/vO951z58y9I6wW0eRGxLQi+ixQDpRmkVngF1QGUL+ficZfV5KQ0NXq4TI8rwuhA/CB70B/BHM1IPilYB4HfSqbcRQTOcj5+tlbG8TOtiL+F0Aa1ffJWH1M1t8ILaRupIT59E6Ud4BikG248W9WNqhK7kalBziFrzuZaPwzB49eKAJgInYzZ71yeC3F3lGUrYjuZbzxcKFBUPlJ4DDu6D7o8gNABfvsDtA9QEWWPYloD+ONny+5dBnsum5gF8jzC50EBtXDZfjeDODgjr6UJ/4J6KvAEKpDWbUtiDQBvbiJzlyT2pMg9VjyMGPx7DuLOZ9iO9eIJu/J3TJnB7ajVCV3kx+2swfbUWxne8563UgJtnMd2zkSdBBNbsTIZVQPcKGxO09kAriOm2gqMACIJYcQWYebsPPy9gMfgFduiNAG+GSsvhzSy8cjQAXImVDxoLyvgcosdymsTKClVptBpQXk+4JRPDGjgIf64d8KgIoBvCx3Kca2/I4ygvFbDLAZYbowu8sHJkFaVungReDi0lAsx3QKlc0GYT3KbytIfIRQj516M790qpy3gAZEukMzA831FoqCaijJTRzDdp4E/RDbaQFOBUDqBZSnQXsYT5wI7058AAuYQ7g/lFQ3UsL8v3+gMg80ZJ+FuImaG1QOrw0/SvQBkDkDXEKJFuBVTg3p9BQqB4AjGGkmEnkI8cox0gz0Ivo2Rd4P2I5dkK8SRfRnIZbaheghiu+4j3N1fy+KKw4wCV47bvOV0A7toQ0QOQ5UIMQZT4wBUD24Br/4Gso+g/r9gGE+3bkIKseAadJe04riAG7zFay7GoAplK+oHb0bAK+oEzCI1x/MePBZP4eVeZRM5HWQd/HlMSbil1YUXx7R1CaM/oTyHkWZj8lYMyD9uPHX8g47SYJWAKO4iY7bEl+ImPMZQi0wDcSx5BHG4lcNQPYmegW0DdgEOvi/xAFEB4Jc2kC2L5ykZpHgJk4j+gbgg7RTc3rdbYtXOfeCtAM+onuX32qF54yd2gr6JfAPyCFMupfzz/wVKlw9uAavqBOR/cCdCNsYT3yb01hoYk2qlIx2AR2AB5wDvYjIHADKgyhPZPfcgPRhcXDpgrmVwWI3QxvQSCvCwm9LWRaZBS6jDCBe/2qj/B9szmvbuNRF2wAAAABJRU5ErkJggg==',
                                                    'size' => 'Small',
                                                    'style' => 'Person'
                                                ]
                                            ]
                                        ],
                                        [
                                            'type' => 'Column',
                                            'width' => 'stretch',
                                            'items' => [
                                                [
                                                    'type' => 'TextBlock',
                                                    'text' => 'New Joiner Account Creation',
                                                    'weight' => 'Bolder',
                                                    'size' => 'Medium',
                                                    'spacing' => 'None'
                                                ],
                                                [
                                                    'type' => 'TextBlock',
                                                    'text' => 'Please create an account for the new joiner. Fill in the username once the account is created.',
                                                    'wrap' => true,
                                                    'spacing' => 'None'
                                                ]

                                            ]
                                        ]
                                    ]
                                ],
                                [
                                    'type' => 'TextBlock',
                                    'text' => 'Joiner Information',
                                    'weight' => 'Bolder',
                                    'size' => 'Small',
                                    'separator' => true

                                ],
                                [
                                    'type' => 'FactSet',
                                    'facts' => [
                                        [
                                            'title' => 'Full Name:',
                                            'value' => $data['fullname']
                                        ],
                                        [
                                            'title' => 'Job Title:',
                                            'value' => $data['jobTitle']
                                        ],
                                        [
                                            'title' => 'Direct Manager:',
                                            'value' => $data['manager']
                                        ],
                                        [
                                            'title' => 'Company Name:',
                                            'value' => $data['company']
                                        ]
                                    ]
                                ],
                                [
                                    'type' => 'TextBlock',
                                    'text' => 'Username',
                                    'weight' => 'Bolder',
                                    'size' => 'Small',
                                    'separator' => true
                                ],
                                [
                                    'type' => 'Input.Text',
                                    'id' => 'username',
                                    'placeholder' => 'Enter username',
                                    'isRequired' => true
                                ]
                            ],
                            'actions' => [
                                [
                                    'type' => 'Action.Submit',
                                    'title' => 'Submit',
                                    'data' => [
                                        'action' => 'submiAccountSet'
                                    ]
                                ],
                                [
                                    'type' => 'Action.Submit',
                                    'title' => 'Cancel',
                                    'data' => [
                                        'action' => 'cancel'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ];
            #endregion
    

        }

    // Display the response
    echo nl2br($response);
} else {
    echo "Invalid request method.";
}

?>
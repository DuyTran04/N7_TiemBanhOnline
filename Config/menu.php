<?php
return $menus = [
    [
        'label' => 'Dashboard',
        'route' => './?module=admin&controller=dashboard',
        'icon' => 'fa-columns'
    ],
    [
        'label' => 'Quản lý danh mục',
        'route' => './?module=admin&controller=category',
        'icon' => 'fa-list',
        'items' => [
            [
                'label' => 'Tất cả danh mục',
                'route' => './?module=admin&controller=category',
            ],
            [
                'label' => 'Thêm danh mục',
                'route' => './?module=admin&controller=category&action=create',
            ]
        ]
    ],
    [
        'label' => 'Quản lý sản phẩm',
        'route' => './?module=admin&controller=product',
        'icon' => 'fa-bread-slice',
        'items' => [
            [
                'label' => 'Tất cả sản phẩm',
                'route' => './?module=admin&controller=product',
            ],
            [
                'label' => 'Thêm sản phẩm',
                'route' => './?module=admin&controller=product&action=create',
            ]
        ]
    ],
    [
        'label' => 'Quản lý mã giảm giá',
        'route' => './?module=admin&controller=coupon',
        'icon' => 'fa-gift',
        'items' => [
            [
                'label' => 'Tất cả mã giảm giá',
                'route' => './?module=admin&controller=coupon',
            ],
            [
                'label' => 'Thêm mã giảm giá',
                'route' => './?module=admin&controller=coupon&action=create',
            ]
        ]
    ],
    [
        'label' => 'Quản lý đánh giá',
        'route' => './?module=admin&controller=review',
        'icon' => 'fa-comment-alt',
        'items' => [
            [
                'label' => 'Tất cả đánh giá',
                'route' => './?module=admin&controller=review',
            ],
        ]
    ],
    [
        'label' => 'Quản lý thông tin liên hệ',
        'route' => './?module=admin&controller=contact',
        'icon' => 'fa-envelope-open-text',
        'items' => [
            [
                'label' => 'Tất cả liên hệ',
                'route' => './?module=admin&controller=contact',
            ],
        ]
    ],
    [
        'label' => 'Quản lý Banner',
        'route' => './?module=admin&controller=banner',
        'icon' => 'fa-image',
        'items' => [
            [
                'label' => 'Tất cả banner',
                'route' => './?module=admin&controller=banner',
            ],
            [
                'label' => 'Thêm banner',
                'route' => './?module=admin&controller=banner&action=create',
            ]
        ]
    ],
    [
        'label' => 'Quản lý đơn hàng',
        'route' => './?module=admin&controller=order',
        'icon' => 'fa-receipt',
        'items' => [
            [
                'label' => 'Tất cả đơn hàng',
                'route' => './?module=admin&controller=order',
            ],
        ]
    ],
    [
        'label' => 'Quản lý tài khoản',
        'route' => './?module=admin&controller=account',
        'icon' => 'fa-user',
        'items' => [
            [
                'label' => 'Tất cả tài khoản',
                'route' => './?module=admin&controller=account',
            ],
            [
                'label' => 'Thêm tài khoản',
                'route' => './?module=admin&controller=account&action=create',
            ]
        ]
    ],
    [
        'label' => 'Quản lý chatbox',
        'route' => './?module=admin&controller=chatbot',
        'icon' => 'fa-robot',
        'items' => [
            [
                'label' => 'All intents',
                'route' => './?module=admin&controller=chatbot',
            ],
            [
                'label' => 'Add intent',
                'route' => './?module=admin&controller=chatbot&action=create',
            ],
            [
                'label' => 'Conversation history',
                'route' => './?module=admin&controller=chatbot&action=conversationHistory',
            ]
        ]
    ]
];
<?php
    #START
        #New
            if($filter__new_the_best == "new" && $filter__calendar_from == null && $filter__calendar_upto == null && $filter__search == null){
                #Day
                    if($filter__day_week_month_year_all_time == "Day"){
                        if($filter__menu == "all_topics"){
                            $FNTT_query = "
                                SELECT * FROM articles100percent
                                WHERE dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)
                                AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                            ";
                        } elseif($filter__menu != "all_topics"){
                            $FNTT_query = "
                                SELECT * FROM articles100percent
                                WHERE dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND category='$filter__menu'
                                AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                            ";
                        }
                    }
                #Week
                    elseif($filter__day_week_month_year_all_time == "Week"){
                        if($filter__menu == "all_topics"){
                                $FNTT_query = "
                                    SELECT * FROM articles100percent
                                    WHERE dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
                                    AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                                ";
                        } elseif($filter__menu != "all_topics"){
                            $FNTT_query = "
                                SELECT * FROM articles100percent
                                WHERE dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) AND category='$filter__menu'
                                AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                            ";
                        }
                    }
                #Month
                    elseif($filter__day_week_month_year_all_time == "Month"){
                        if($filter__menu == "all_topics"){
                            $FNTT_query = "
                                SELECT * FROM articles100percent
                                WHERE dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
                                AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                            ";
                        } elseif($filter__menu != "all_topics"){
                            $FNTT_query = "
                                SELECT * FROM articles100percent
                                WHERE dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND category='$filter__menu'
                                AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                            ";
                        }
                    }
                #Year
                    elseif($filter__day_week_month_year_all_time == "Year"){
                        if($filter__menu == "all_topics"){
                            $FNTT_query = "
                                SELECT * FROM articles100percent
                                WHERE dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
                                AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                            ";
                        } elseif($filter__menu != "all_topics"){
                            $FNTT_query = "
                                SELECT * FROM articles100percent
                                WHERE dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND category='$filter__menu'
                                AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                            ";
                        }
                    }
                #Any time
                    elseif($filter__day_week_month_year_all_time == "All_time"){
                        if($filter__menu == "all_topics"){
                            $FNTT_query = "
                                SELECT *
                                FROM articles100percent 
                                WHERE status = '0'
                                ORDER BY id $limit
                            ";
                        } elseif($filter__menu != "all_topics"){
                            $FNTT_query = "
                                SELECT *
                                FROM articles100percent 
                                WHERE status = '0' AND category='$filter__menu'
                                ORDER BY id $limit
                            ";
                        }
                    }
            }
        #The best
            elseif($filter__new_the_best == "the_best" && $filter__calendar_from == null && $filter__calendar_upto == null && $filter__search == null){
                #Day
                    if($filter__day_week_month_year_all_time == "Day"){
                        if($filter__menu == "all_topics"){
                            $FNTT_query = "
                                SELECT a.*, likes.like_count
                                FROM articles100percent AS a
                                LEFT JOIN (
                                    SELECT id_of_article, COUNT(id_of_article) AS like_count
                                    FROM liked
                                    GROUP BY id_of_article
                                ) AS likes ON a.id = likes.id_of_article
                                WHERE a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)
                                ORDER BY likes.like_count $limit;
                            ";
                        } elseif($filter__menu != "all_topics"){
                            $FNTT_query = "
                                SELECT a.*, likes.like_count
                                FROM articles100percent AS a
                                LEFT JOIN (
                                    SELECT id_of_article, COUNT(id_of_article) AS like_count
                                    FROM liked
                                    GROUP BY id_of_article
                                ) AS likes ON a.id = likes.id_of_article
                                WHERE category='$filter__menu' AND a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)
                                ORDER BY likes.like_count $limit;
                            ";
                        }
                    }
                #Week
                    elseif($filter__day_week_month_year_all_time == "Week"){
                        if($filter__menu == "all_topics"){
                            $FNTT_query = "
                                SELECT a.*, likes.like_count
                                FROM articles100percent AS a
                                LEFT JOIN (
                                    SELECT id_of_article, COUNT(id_of_article) AS like_count
                                    FROM liked
                                    GROUP BY id_of_article
                                ) AS likes ON a.id = likes.id_of_article
                                WHERE a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
                                ORDER BY likes.like_count $limit;
                            ";
                        } elseif($filter__menu != "all_topics"){
                            $FNTT_query = "
                                SELECT a.*, likes.like_count
                                FROM articles100percent AS a
                                LEFT JOIN (
                                    SELECT id_of_article, COUNT(id_of_article) AS like_count
                                    FROM liked
                                    GROUP BY id_of_article
                                ) AS likes ON a.id = likes.id_of_article
                                WHERE category='$filter__menu' AND a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
                                ORDER BY likes.like_count $limit;
                            ";
                        }
                    }
                #Month
                    elseif($filter__day_week_month_year_all_time == "Month"){
                        if($filter__menu == "all_topics"){
                            $FNTT_query = "
                                SELECT a.*, likes.like_count
                                FROM articles100percent AS a
                                LEFT JOIN (
                                    SELECT id_of_article, COUNT(id_of_article) AS like_count
                                    FROM liked
                                    GROUP BY id_of_article
                                ) AS likes ON a.id = likes.id_of_article
                                WHERE a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
                                ORDER BY likes.like_count $limit;
                            ";
                        } elseif($filter__menu != "all_topics"){
                            $FNTT_query = "
                                SELECT a.*, likes.like_count
                                FROM articles100percent AS a
                                LEFT JOIN (
                                    SELECT id_of_article, COUNT(id_of_article) AS like_count
                                    FROM liked
                                    GROUP BY id_of_article
                                ) AS likes ON a.id = likes.id_of_article
                                WHERE category='$filter__menu' AND a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
                                ORDER BY likes.like_count $limit;
                            ";
                        }
                    }
                #Year
                    elseif($filter__day_week_month_year_all_time == "Year"){
                        if($filter__menu == "all_topics"){
                            $FNTT_query = "
                                SELECT a.*, likes.like_count
                                FROM articles100percent AS a
                                LEFT JOIN (
                                    SELECT id_of_article, COUNT(id_of_article) AS like_count
                                    FROM liked
                                    GROUP BY id_of_article
                                ) AS likes ON a.id = likes.id_of_article
                                WHERE a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
                                ORDER BY likes.like_count $limit;
                            ";
                        } elseif($filter__menu != "all_topics"){
                            $FNTT_query = "
                                SELECT a.*, likes.like_count
                                FROM articles100percent AS a
                                LEFT JOIN (
                                    SELECT id_of_article, COUNT(id_of_article) AS like_count
                                    FROM liked
                                    GROUP BY id_of_article
                                ) AS likes ON a.id = likes.id_of_article
                                WHERE category='$filter__menu' AND a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
                                ORDER BY likes.like_count $limit;
                            ";
                        }
                    }
                #Any time
                    elseif($filter__day_week_month_year_all_time == "All_time"){
                        if($filter__menu == "all_topics"){
                            $FNTT_query = "
                                SELECT a.*, likes.like_count
                                FROM articles100percent AS a
                                LEFT JOIN (
                                    SELECT id_of_article, COUNT(id_of_article) AS like_count
                                    FROM liked
                                    GROUP BY id_of_article
                                ) AS likes ON a.id = likes.id_of_article
                                ORDER BY likes.like_count $limit;
                            ";
                        } elseif($filter__menu != "all_topics"){
                            $FNTT_query = "
                                SELECT a.*, likes.like_count
                                FROM articles100percent AS a
                                LEFT JOIN (
                                    SELECT id_of_article, COUNT(id_of_article) AS like_count
                                    FROM liked
                                    GROUP BY id_of_article
                                ) AS likes ON a.id = likes.id_of_article
                                WHERE category='$filter__menu'
                                ORDER BY likes.like_count $limit;
                            ";
                        }
                    }
            }
        #New&Calendar
            elseif($filter__new_the_best == "new" && $filter__calendar_from != null && $filter__calendar_upto != null && $filter__menu != null && $filter__search == null){
                if($filter__menu == "all_topics"){
                    $FNTT_query = "
                        SELECT * FROM articles100percent WHERE dateofpublication BETWEEN '$filter__calendar_from' AND '$filter__calendar_upto' ORDER BY id $limit;
                    ";
                } elseif($filter__menu != "all_topics"){
                    $FNTT_query = "
                        SELECT * FROM articles100percent WHERE dateofpublication BETWEEN '$filter__calendar_from' AND '$filter__calendar_upto' AND category='$filter__menu' ORDER BY id $limit;
                    ";
                }
            }
        #The best&Calendar
            elseif($filter__new_the_best == "the_best" && $filter__calendar_from != null && $filter__calendar_upto != null && $filter__menu != null && $filter__search == null){
                if($filter__menu == "all_topics"){
                    $FNTT_query = "
                        SELECT * FROM articles100percent WHERE dateofpublication BETWEEN '$filter__calendar_from' AND '$filter__calendar_upto' ORDER BY id $limit;
                    ";
                } elseif($filter__menu != "all_topics"){
                    $FNTT_query = "
                        SELECT * FROM articles100percent WHERE dateofpublication BETWEEN '$filter__calendar_from' AND '$filter__calendar_upto' AND category='$filter__menu' ORDER BY id $limit;
                    ";
                }
            }
        #Search
            #New
                elseif($filter__new_the_best == "new" && $filter__calendar_from == null && $filter__calendar_upto == null && $filter__menu != null && $filter__search != null){
                    #Day
                        if($filter__day_week_month_year_all_time == "Day"){
                            if($filter__menu == "all_topics"){
                                $FNTT_query = "
                                    SELECT * FROM articles100percent
                                    WHERE title LIKE '$filter__search%' AND dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)
                                    AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                                ";
                            } elseif($filter__menu != "all_topics"){
                                $FNTT_query = "
                                    SELECT * FROM articles100percent
                                    WHERE title LIKE '$filter__search%' AND dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND category='$filter__menu'
                                    AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                                ";
                            }
                        }
                    #Week
                        elseif($filter__day_week_month_year_all_time == "Week"){
                            if($filter__menu == "all_topics"){
                                $FNTT_query = "
                                    SELECT * FROM articles100percent
                                    WHERE title LIKE '$filter__search%' AND dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
                                    AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                                ";
                            } elseif($filter__menu != "all_topics"){
                                $FNTT_query = "
                                    SELECT * FROM articles100percent
                                    WHERE title LIKE '$filter__search%' AND dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK) AND category='$filter__menu'
                                    AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                                ";
                            }
                        }
                    #Month
                        elseif($filter__day_week_month_year_all_time == "Month"){
                            if($filter__menu == "all_topics"){
                                $FNTT_query = "
                                    SELECT * FROM articles100percent
                                    WHERE title LIKE '$filter__search%' AND dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
                                    AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                                ";
                            } elseif($filter__menu != "all_topics"){
                                $FNTT_query = "
                                    SELECT * FROM articles100percent
                                    WHERE title LIKE '$filter__search%' AND dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND category='$filter__menu'
                                    AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                                ";
                            }
                        }
                    #Year
                        elseif($filter__day_week_month_year_all_time == "Year"){
                            if($filter__menu == "all_topics"){
                                $FNTT_query = "
                                    SELECT * FROM articles100percent
                                    WHERE title LIKE '$filter__search%' AND dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
                                    AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                                ";
                            } elseif($filter__menu != "all_topics"){
                                $FNTT_query = "
                                    SELECT * FROM articles100percent
                                    WHERE title LIKE '$filter__search%' AND dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND category='$filter__menu'
                                    AND dateofpublication < CURDATE() AND status='0' ORDER BY id $limit;
                                ";
                            }
                        }
                    #Any time
                        elseif($filter__day_week_month_year_all_time == "All_time"){
                            if($filter__menu == "all_topics"){
                                $FNTT_query = "
                                    SELECT *
                                    FROM articles100percent 
                                    WHERE title LIKE '$filter__search%' AND status = '0'
                                    ORDER BY id $limit
                                ";
                            } elseif($filter__menu != "all_topics"){
                                $FNTT_query = "
                                    SELECT *
                                    FROM articles100percent 
                                    WHERE title LIKE '$filter__search%' AND status = '0' AND category='$filter__menu'
                                    ORDER BY id $limit
                                ";
                            }
                        }
                }
            #The best
                elseif($filter__new_the_best == "the_best" && $filter__calendar_from == null && $filter__calendar_upto == null && $filter__menu != null && $filter__search != null){
                    #Day
                        if($filter__day_week_month_year_all_time == "Day"){
                            if($filter__menu == "all_topics"){
                                $FNTT_query = "
                                    SELECT a.*, likes.like_count
                                    FROM articles100percent AS a
                                    LEFT JOIN (
                                        SELECT id_of_article, COUNT(id_of_article) AS like_count
                                        FROM liked
                                        GROUP BY id_of_article
                                    ) AS likes ON a.id = likes.id_of_article
                                    WHERE title LIKE '$filter__search%' AND a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)
                                    ORDER BY likes.like_count $limit;
                                ";
                            } elseif($filter__menu != "all_topics"){
                                $FNTT_query = "
                                    SELECT a.*, likes.like_count
                                    FROM articles100percent AS a
                                    LEFT JOIN (
                                        SELECT id_of_article, COUNT(id_of_article) AS like_count
                                        FROM liked
                                        GROUP BY id_of_article
                                    ) AS likes ON a.id = likes.id_of_article
                                    WHERE title LIKE '$filter__search%' AND category = '$filter__menu' AND a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)
                                    ORDER BY likes.like_count $limit;
                                ";
                            }
                        }
                    #Week
                        elseif($filter__day_week_month_year_all_time == "Week"){
                            if($filter__menu == "all_topics"){
                                $FNTT_query = "
                                    SELECT a.*, likes.like_count
                                    FROM articles100percent AS a
                                    LEFT JOIN (
                                        SELECT id_of_article, COUNT(id_of_article) AS like_count
                                        FROM liked
                                        GROUP BY id_of_article
                                    ) AS likes ON a.id = likes.id_of_article
                                    WHERE title LIKE '$filter__search%' AND a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
                                    ORDER BY likes.like_count $limit;
                                ";
                            } elseif($filter__menu != "all_topics"){
                                $FNTT_query = "
                                    SELECT a.*, likes.like_count
                                    FROM articles100percent AS a
                                    LEFT JOIN (
                                        SELECT id_of_article, COUNT(id_of_article) AS like_count
                                        FROM liked
                                        GROUP BY id_of_article
                                    ) AS likes ON a.id = likes.id_of_article
                                    WHERE title LIKE '$filter__search%' AND category = '$filter__menu' AND a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
                                    ORDER BY likes.like_count $limit;
                                ";
                            }
                        }
                    #Month
                        elseif($filter__day_week_month_year_all_time == "Month"){
                            if($filter__menu == "all_topics"){
                                $FNTT_query = "
                                    SELECT a.*, likes.like_count
                                    FROM articles100percent AS a
                                    LEFT JOIN (
                                        SELECT id_of_article, COUNT(id_of_article) AS like_count
                                        FROM liked
                                        GROUP BY id_of_article
                                    ) AS likes ON a.id = likes.id_of_article
                                    WHERE title LIKE '$filter__search%' AND a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
                                    ORDER BY likes.like_count $limit;
                                ";
                            } elseif($filter__menu != "all_topics"){
                                $FNTT_query = "
                                    SELECT a.*, likes.like_count
                                    FROM articles100percent AS a
                                    LEFT JOIN (
                                        SELECT id_of_article, COUNT(id_of_article) AS like_count
                                        FROM liked
                                        GROUP BY id_of_article
                                    ) AS likes ON a.id = likes.id_of_article
                                    WHERE title LIKE '$filter__search%' AND category = '$filter__menu' AND a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)
                                    ORDER BY likes.like_count $limit;
                                ";
                            }
                        }
                    #Year
                        elseif($filter__day_week_month_year_all_time == "Year"){
                            if($filter__menu == "all_topics"){
                                $FNTT_query = "
                                    SELECT a.*, likes.like_count
                                    FROM articles100percent AS a
                                    LEFT JOIN (
                                        SELECT id_of_article, COUNT(id_of_article) AS like_count
                                        FROM liked
                                        GROUP BY id_of_article
                                    ) AS likes ON a.id = likes.id_of_article
                                    WHERE title LIKE '$filter__search%' AND a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
                                    ORDER BY likes.like_count $limit;
                                ";
                            } elseif($filter__menu != "all_topics"){
                                $FNTT_query = "
                                    SELECT a.*, likes.like_count
                                    FROM articles100percent AS a
                                    LEFT JOIN (
                                        SELECT id_of_article, COUNT(id_of_article) AS like_count
                                        FROM liked
                                        GROUP BY id_of_article
                                    ) AS likes ON a.id = likes.id_of_article
                                    WHERE title LIKE '$filter__search%' AND category = '$filter__menu' AND a.dateofpublication >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
                                    ORDER BY likes.like_count $limit;
                                ";
                            }
                        }
                    #Any time
                        elseif($filter__day_week_month_year_all_time == "All_time"){
                            if($filter__menu == "all_topics"){
                                $FNTT_query = "
                                    SELECT a.*, likes.like_count
                                    FROM articles100percent AS a
                                    LEFT JOIN (
                                        SELECT id_of_article, COUNT(id_of_article) AS like_count
                                        FROM liked
                                        GROUP BY id_of_article
                                    ) AS likes ON a.id = likes.id_of_article
                                    WHERE title LIKE '$filter__search%'
                                    ORDER BY likes.like_count $limit;
                                ";
                            } elseif($filter__menu != "all_topics"){
                                $FNTT_query = "
                                    SELECT a.*, likes.like_count
                                    FROM articles100percent AS a
                                    LEFT JOIN (
                                        SELECT id_of_article, COUNT(id_of_article) AS like_count
                                        FROM liked
                                        GROUP BY id_of_article
                                    ) AS likes ON a.id = likes.id_of_article
                                    WHERE title LIKE '$filter__search%' AND category = '$filter__menu'
                                    ORDER BY likes.like_count $limit;
                                ";
                            }
                        }
                }
    #END
?>
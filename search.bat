
@echo off
set /p search_term=Query term: %=%
set /p search_type=Enter the scoring method "BM25" or "TFIDF": %=%
set /p search_operation=Enter the operation "AND" or "OR" (case sensitive): %=%


python C:\Users\divy\PycharmProjects\Crawling\searcher.py %1 %search_term% %search_type% %search_operation% 

pause

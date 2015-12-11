import os
import os.path
import os.path
from bs4 import BeautifulSoup
from whoosh import scoring
from whoosh import index
from whoosh.fields import Schema, ID, TEXT
from whoosh import index
from whoosh.fields import *
import whoosh.index as index
from whoosh.filedb.filestore import FileStorage
from whoosh.index import create_in, open_dir, exists_in
from whoosh.qparser import QueryParser
from whoosh.query import *
from whoosh.qparser import QueryParser
from whoosh import qparser
from whoosh import highlight
import re

from whoosh.scoring import MultiWeighting, TF_IDF, Frequency, bm25, BM25F

create_new_index = True
dirname = "indexdir"
schema = Schema(
    path=NGRAM(minsize=4, maxsize=11, stored=True, sortable=True),  # ID: indexes the entire field as a single unit
    title=TEXT(field_boost=2.0, stored=True, phrase=True, sortable=True),
    # False parsing gets term frequency, stemming is not allowed for titles and titles are boosted
    content=TEXT(analyzer=analysis.StemmingAnalyzer(), stored=True, phrase=True, sortable=True),
)

if not os.path.exists("indexdir"):
    os.mkdir("indexdir")

ix = create_in("indexdir", schema)
writer = ix.writer()
path = os.getcwd()
path += "/test1"
for filename in os.listdir(path):
    f = open(path + "\\" + filename, 'r')
    content = f.read()
    soup = BeautifulSoup(content, 'html.parser')  # variable to call beautifulsoup(variable of the source code)
    for script in soup.find_all('script'):
        script.extract()
    for style in soup.find_all('style'):
        style.extract()

    f_string = ""
    for string in soup.stripped_strings:
        f_string += string
    link = soup.find('page_url', href=True)
    # print(f_string)
    try:
        writer.add_document(path=link['href'], title=filename[:-4], content=f_string)
    except:
        writer.add_document(path=u'None', title=filename[:-4], content=f_string)


writer.commit()
qp = qparser.MultifieldParser(['content', 'path', 'title'], ix.schema, group=qparser.OrGroup)
query = qp.parse("transgenic growth ")
# print(query)

b = BM25F(B=0.75, K1=1.5)
t = TF_IDF()
f = Frequency()
with ix.searcher(weighting=f) as searcher:
    results = searcher.search(query, terms=True,)
    results.fragmenter = highlight.ContextFragmenter(maxchars=50, surround=90,)

    if results:
        for hit in results:
            snip = hit.highlights('content')
            title = hit['title']
            score = hit.score
            path = hit['path']
            print(title, path, score, '\n', snip)
    # print(list(searcher.lexicon("path")))
    # print(results)
    # if results:
    #     print(results[0])
    # for hit in results:
    #     print(hit["title"])
    #     print(hit.highlights("path", top=2))
    #     print('\n')
    # print("results are: \n")
    # print(results)


#!/usr/bin/python
import sys

if (len(sys.argv)<5):
	print "usage %s dir filename count description" % sys.argv[0]
else:
	for i in range(int(sys.argv[3])):
		print '<a href="%s/%s%03d.JPG" rel="lightbox[%s]" title="%s">' \
			% (sys.argv[1], sys.argv[2], i, sys.argv[2], sys.argv[4])
		print '<img src="%s/thumbs/%s%03d.JPG" alt="%s"/></a>' \
			% (sys.argv[1], sys.argv[2], i, sys.argv[4])


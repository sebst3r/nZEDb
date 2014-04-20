ALTER TABLE settings CHANGE value value VARCHAR(1000) NOT NULL DEFAULT '';
ALTER TABLE settings CHANGE hint hint TEXT NOT NULL;
UPDATE settings SET value = "<p>All information within this database is indexed by an automated process, without any human intervention. It is obtained from global Usenet newsgroups over which this site has no control. We cannot prevent that you might find obscene or objectionable material by using this service. If you do find obscene, incorrect or objectionable results, let us know by using the contact form.</p>" WHERE setting = "tandc";
UPDATE settings SET hint = "The maximum amount of articles to attempt to repair at a time. If you notice that you are getting a lot of parts into the partrepair table, it is possible that you USP is not keeping up with the requests. Try to reduce the threads to safe scripts, stop using safe scripts or stop using nntpproxy until improves. Ar least until the cause can be determined." WHERE setting = "maxpartrepair";

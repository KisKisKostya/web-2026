PROGRAM HelloName(INPUT, OUTPUT);
USES
  DOS;
VAR
  QueryString, Name: STRING;
  PosName, PosAmp: INTEGER;
BEGIN
  QueryString := GetEnv('QUERY_STRING');

  PosName := Pos('name=', QueryString);
  IF PosName > 0 THEN
    BEGIN
      Delete(QueryString, 1, PosName + 4);
      PosAmp := Pos('&', QueryString);
      IF PosAmp > 0 THEN
        Name := Copy(QueryString, 1, PosAmp - 1)
      ELSE
        Name := QueryString
    END
  ELSE
    Name := '';
  WRITELN('Content-Type: text/plain');
  WRITELN;

  IF Name <> '' THEN
    WRITELN('Hello dear, ', Name, '!')
  ELSE
    WRITELN('Hello Anonymous!')
END.

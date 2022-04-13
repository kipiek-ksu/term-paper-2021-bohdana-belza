program lab_10_20;
var surname, data: string;
    f: text;
    flag: boolean;

begin
  read(surname);
  flag:=false;

  assign(f,'phone.txt');
  reset(f);
    while not eof(f) do begin
      readln(f,data);
      if copy(data,1,length(surname))=surname then begin
         writeln(data);
         flag:=true;
         end;
      end;
  if not flag then write('NO');
  close(f);
end.
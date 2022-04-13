program _20;
var surname, data: string;
    f: text;
    flag: boolean;

begin
  read(obr);
  flag:=false;

  assign(f,'phone.txt');
  reset(f);
    while not eof(f) do begin
      readln(f,data);
      if copy(data,1,length(obr))=obr then begin
         write(data);
         flag:=true;
         end;
      end;
  if not flag then write('NO');
  close(f);
end.
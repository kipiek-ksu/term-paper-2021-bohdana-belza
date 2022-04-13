program _20;
var surname, data: string;
    f: text;
    flag: boolean;

begin
  read(surname);
  flag:=false;

  assign(f);
  reset(f);
    while not eof(f) do begin
      read(f,data);
      if copy(data,1,length(surname))=surname then begin
         write(data);
         flag:=true;
         end;
      end;
  if not flag then write('NO');
  close(f);
end.
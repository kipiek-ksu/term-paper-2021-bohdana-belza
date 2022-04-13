program _30;
uses crt;
var result,st : string;

procedure dletter(tword: string);
var flag: boolean;
    i: integer;
begin
  flag:=false;
  for i:=1 to length(tword)-1 do
    if tword[i+1]=tword[i] then flag:=true;
  if flag then result:=result+tword+' ';
end;

begin
  clrscr;
  write('Input string: ');
  readln(st);
  result:='';
  while pos(' ',st)<>0 do begin
    dletter(copy(st,1,pos(' ',st)-1));
    delete(st,1,pos(' ',st));
    end;
  if st<>'' then dletter(st);
  if result<>'' then write(result) else write('NO');
end.
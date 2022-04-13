program biglatlit;
var  ch,ch1:char;
     i:integer;
begin
     read(ch);
     ch1:=ch;
     for i:=1 to 32 do
     begin
        ch1:=pred(ch1);
     end;
     write(ch1);
end.
program L_8_1;
var s: integer;
    p: string;

function poisk(slovo: string): boolean;
begin
 if (length(slovo)<2) then
  poisk:=true 
 else
  poisk:=(copy(slovo,1,1) = copy(slovo,length(slovo),1)) and poisk(copy(slovo,2,length(slovo)-2));  
end;

begin
 read(s);
 p:=inttostr(s);
 if poisk(p) = true then
  write('TRUE')
 else
  Write('FALSE');
end.
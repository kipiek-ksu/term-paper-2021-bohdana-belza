program ex_4;
var
  Str:string;
  R,L,i:byte;
  Flag:boolean;
begin
  readln(Str);
  R:=0;
  Flag:=True;
  L:=Length(Str);
  for i:=1 to L do
  begin
    if (Str[i]<>' ')or(str[i]='-')and(str[i-1]<>' ')and(str[i+1]<>' ')
    then
    begin
      if Flag then
      begin
        R:=R+1;
        if (str[i]='-')and(str[i-1]=' ')and(str[i+1]=' ')then R:=R-1;
        Flag:=False
      end
    end
    else
    if not Flag then Flag:=True
  end;
  write(R)
end.